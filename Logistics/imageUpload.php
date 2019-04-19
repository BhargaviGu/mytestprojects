<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $target_dir   = getcwd()."/assets/img";
    $image_name   = 'lt_middle_logoo.png';
    $image        = $_FILES["file"]["name"];
    $name         = basename($_FILES["file"]["name"]);
    $uploadedfile = $_FILES['file']['tmp_name'];
   
    if($image == "") 
    {   
        $change = 'Image not found to upload';
        $errors = 1;
    }else{
        $filename  = stripslashes($_FILES['file']['name']);
        $extension = getExtension($filename);
        $extension = strtolower($extension);
        if (($extension != "png")){
            $change = 'Not a png file';
            $errors = 1;
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"], "$target_dir/$image_name");
       }
    }
}   

?>

<script type="text/javascript">
  //var url = "{{ url() }}/admin/platform_config";
  //setTimeout(function(){window.location.href= url}, 3000);
</script>

<?php

function getExtension($str)
  {
    $i = strrpos($str, ".");
    if (!$i)
      {
        return "";
      }
    $l   = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
  }

?>
