var cacheName = 'LSC';
var filesToCache = [
  '/',
  '/LSC/dashboard/index',
  '/LSC/dashboard/profile',
  '/LSC/dashboard/leaderboard',
  
  '/LSC/assets/js/jquery.js',
  '/LSC/assets/js/bootstrap.min.js',
  '/LSC/assets/js/dexie.js',
  '/LSC/assets/js/app.js',
  '/LSC/assets/js/profile.js',
  '/LSC/assets/js/leaderboard.js',
  '/LSC/assets/js/loader.js',
  
  '/LSC/assets/css/inline.css',
  '/LSC/assets/css/bootstrap.min.css',
  '/LSC/assets/css/font-awesome.css',
  
  '/LSC/assets/css/master.css',
  '/LSC/assets/css/index.css',
  
  '/LSC/assets/css/profile.css',
  
  '/LSC/assets/spinners/mk-spinners.css',
  '/LSC/assets/css/register.css',
  
  '/LSC/assets/css/leaderboard.css',
  
  '/LSC/assets/img/logo/44.jpg',
  '/LSC/assets/favicon/favicon.ico',
  '/LSC/images/icons/LSC.png',
  
  '/LSC/manifest.json',
  
  
];

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install.');

  if (self.skipWaiting) { self.skipWaiting(); }
    e.waitUntil(
        caches.open(cacheName).then(function(cache) {
            return Promise.all(filesToCache.map(function(url) {
                console.log('[ServiceWorker] Caching App Shell');
                return cache.add(url);
            }));
        })
    );
 
});

self.addEventListener('activate', function(event) {
  console.log('[ServiceWorker] Activate');

    var cacheWhitelist = [cacheName];

    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        console.log('[ServiceWorker] Removing old cache', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

self.addEventListener('fetch', function(event) {
var requestURL = new URL(event.request.url);

    event.respondWith(

        fetch(event.request).then(function(response) {
            if (response.status === 200) {
                caches.open(cacheName).then(function(cache) {
                    cache.put(event.request, response);
                });
            }
            return response.clone();
        }).catch(function(error) {
            return caches.open(cacheName)
                .then(function(cache) {

                    return cache.match(event.request)
                        .then(function(cachedResponse) {
                            if (cachedResponse) {
                                return cachedResponse;
                            } else {
                                return error
                            };
                        })
                })
        })
    )
});
