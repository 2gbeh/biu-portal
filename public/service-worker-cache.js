importScripts(
  "https://storage.googleapis.com/workbox-cdn/releases/6.0.2/workbox-sw.js"
);

workbox.routing.registerRoute(
  ({ request }) => request.destination === "image",
  new workbox.strategies.CacheFirst()
);

{
  /* <script type="text/javascript">
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./service-worker-cache.js', {scope: './'})
    .then(function(registration) {console.log('Service worker registered', registration);})
    .catch(function(error) {console.log('Service worker not registered', error);});
  }
</script> */
}
