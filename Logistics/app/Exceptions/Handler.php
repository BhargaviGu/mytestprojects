<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Session;
use Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        /*if ($request->ajax()) {
            $this->send_mail($request->url(), $e->getMessage());
            return response()->json(array('status'=>'fail', 'data'=> $e->getMessage()));
        }*/

        if ($e instanceof \Illuminate\Session\TokenMismatchException) {
            Session::flash('message', 'Security token expired. Please try again');
            return redirect(\URL::previous());
        }

        /*if (app()->environment() == 'production') {
            $message = $e->getMessage() ? $e->getMessage() : "Page not found";
            $this->send_mail($request->url(), $message);
            return response()->view('errors.500', [], 500);
        }*/

        return parent::render($request, $e);
    }

    public function send_mail($url, $message){
        Log::info("Started sending error e-mail");
        $config = parse_ini_file(app_path()."/integration_scripts/config.ini", true);
        $from = $config['mail']['sender'];
        $environment = $config['mail']['environment'];
        $to = join(", ", json_decode($config['mail']['error_alert_receivers']));
        $curdate = date('Y-m-d');
        $subject = "XNET SERVER ERROR ALERTS [".$environment."]";
        $from_name = "LSC Support";
        $sender_message = "<html><head></head><body>".
                            "<p>Hi Team,</p>".
                            "<p>Got below error :<br><strong>".$message."</strong></p>".
                            "<p>When trying to access this url :<br><strong>".$url."</strong></p>"."</body></html>".
                            "<p>The user is : <strong>".Session::get('userId')."</strong></p>";
        $boundary = md5("sanwebe.com"); 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: ".$from_name." <".$from.">\r\n"; 
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($sender_message)); 
        // now send the email
        $retval = @mail($to, $subject, $body, $headers);
        Log::info("Error e-mail has been successfully sent");
        return $retval;
    }
}
