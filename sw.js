/**
 * Welcome to your Workbox-powered service worker!
 *
 * You'll need to register this file in your web app and you should
 * disable HTTP caching for this file too.
 * See https://goo.gl/nhQhGp
 *
 * The rest of the code is auto-generated. Please don't update this file
 * directly; instead, make changes to your Workbox build configuration
 * and re-run your build process.
 * See https://goo.gl/2aRDsh
 */

importScripts("https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js");

self.addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    self.skipWaiting();
  }
});

workbox.routing.registerRoute(
  // Cache js files.
  /\.js/,
  // Use cache but update in the background.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'js-cache',
    plugins: [
      new workbox.expiration.Plugin({
        // Cache only 20 images.
        maxEntries: 20,
        // Cache for a maximum of a week.
        maxAgeSeconds: 7 * 24 * 60 * 60,
      })
    ],
  })
);
workbox.routing.registerRoute(
  // Cache js files.
  /\.woff2/,
  // Use cache but update in the background.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'woff2-cache',
    plugins: [
      new workbox.expiration.Plugin({
        // Cache only 20 images.
        maxEntries: 20,
        // Cache for a maximum of a week.
        maxAgeSeconds: 7 * 24 * 60 * 60,
      })
    ],
  })
);
workbox.routing.registerRoute(
  // Cache js files.
  /\.php/,
  // Use cache but update in the background.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'php-cache',
    plugins: [
      new workbox.expiration.Plugin({
        // Cache only 20 images.
        maxEntries: 20,
        // Cache for a maximum of a week.
        maxAgeSeconds: 7 * 24 * 60 * 60,
      })
    ],
  })
);

workbox.routing.registerRoute(
  // Cache CSS files.
  /\.css/,
  // Use cache but update in the background.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'css-cache',
        plugins: [
      new workbox.expiration.Plugin({
        // Cache only 20 images.
        maxEntries: 20,
        // Cache for a maximum of a week.
        maxAgeSeconds: 7 * 24 * 60 * 60,
      })
    ],
  })
);
workbox.routing.registerRoute(
  // Cache image files.
  /\.(?:png|jpg|jpeg|svg|gif)$/,
  // Use the cache if it's available.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'image-cache',
    plugins: [
      new workbox.expiration.Plugin({
        // Cache only 20 images.
        maxEntries: 20,
        // Cache for a maximum of a week.
        maxAgeSeconds: 7 * 24 * 60 * 60,
      })
    ],
  })
);

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
self.__precacheManifest = [
  {
    "url": "charts.php",
    "revision": "1c65593dce6e34672b8e864c0ce761f0"
  },
  {
    "url": "config.php",
    "revision": "99381d9d6a50068c6ba488f0b2137294"
  },
  {
    "url": "earnings.php",
    "revision": "e23e890fc397f79c0ff717e459e62e55"
  },
  {
    "url": "fonts/css/all.css",
    "revision": "a207426366c2b281571ec581ca8acc62"
  },
  {
    "url": "fonts/css/brands.css",
    "revision": "50ae18beebd796d9b9082b9209918456"
  },
  {
    "url": "fonts/css/brands.min.css",
    "revision": "38762c06ee069170da13ffb98351ef29"
  },
  {
    "url": "fonts/css/fontawesome-all.min.css",
    "revision": "10519cfd3206802f58315b877a9beab5"
  },
  {
    "url": "fonts/css/fontawesome.css",
    "revision": "73cad59eb2860b3c468d5c3449b68dc5"
  },
  {
    "url": "fonts/css/fontawesome.min.css",
    "revision": "990d1b83f594d7989624157b607e31ff"
  },
  {
    "url": "fonts/css/regular.css",
    "revision": "c1dabf43b35754bfcd8cb8e573d97451"
  },
  {
    "url": "fonts/css/regular.min.css",
    "revision": "0b52012237ecad2b82bbd8aea374b231"
  },
  {
    "url": "fonts/css/solid.css",
    "revision": "f3ec1cd710f7f243ba42b55ffea5e6b0"
  },
  {
    "url": "fonts/css/solid.min.css",
    "revision": "7b33067702cdc57fc1ce64bbcbaae492"
  },
  {
    "url": "fonts/css/svg-with-js.css",
    "revision": "23c782c1fb927e632f74e293fc655968"
  },
  {
    "url": "fonts/css/svg-with-js.min.css",
    "revision": "7b88c59c03106d736b4206c6ceafcf06"
  },
  {
    "url": "fonts/css/v4-shims.css",
    "revision": "fe0f09381a1440722b64ac99c67e6809"
  },
  {
    "url": "fonts/css/v4-shims.min.css",
    "revision": "25b2445e0c1838b110583405b3ec0177"
  },
  {
    "url": "fonts/js/all.js",
    "revision": "a4b28c53f67b8e03ec3df1b4621febba"
  },
  {
    "url": "fonts/js/all.min.js",
    "revision": "d0482db440697a659af4980d2e841891"
  },
  {
    "url": "fonts/js/brands.js",
    "revision": "1a11bd6f2ba52b1a64917befd17cad9c"
  },
  {
    "url": "fonts/js/brands.min.js",
    "revision": "db2c756dffd7a2ebd478d717d57f71f3"
  },
  {
    "url": "fonts/js/fontawesome.js",
    "revision": "50af86747d568bafc71abdf45fcc6431"
  },
  {
    "url": "fonts/js/fontawesome.min.js",
    "revision": "f2a6f85df075827ab70407f852cc4655"
  },
  {
    "url": "fonts/js/regular.js",
    "revision": "aa19256d0b1a3ff10ade60fac1ab2f0b"
  },
  {
    "url": "fonts/js/regular.min.js",
    "revision": "79cd9e30b4b211801e41beb79bc6a286"
  },
  {
    "url": "fonts/js/solid.js",
    "revision": "868fdcf9c37b821a0edf28a7de13958c"
  },
  {
    "url": "fonts/js/solid.min.js",
    "revision": "53b10f67bd9ae19de0f16e29c851c622"
  },
  {
    "url": "fonts/js/v4-shims.js",
    "revision": "f9e2e19cffd1a01e870624f8c111277b"
  },
  {
    "url": "fonts/js/v4-shims.min.js",
    "revision": "ee849cdefc4ea73142659f04402a1a99"
  },
  {
    "url": "fonts/less/_animated.less",
    "revision": "b045fe8800c8f96593cac5227dc70262"
  },
  {
    "url": "fonts/less/_bordered-pulled.less",
    "revision": "d7ea7f8a7cdd50096d33e87e1ffa72e7"
  },
  {
    "url": "fonts/less/_core.less",
    "revision": "afc2d21306033cb43d322aad01824bcf"
  },
  {
    "url": "fonts/less/_fixed-width.less",
    "revision": "66841bce86bf73e79d8f0bff3d9cf7e5"
  },
  {
    "url": "fonts/less/_icons.less",
    "revision": "6db86b5dea4c2104aadef50773c66d6d"
  },
  {
    "url": "fonts/less/_larger.less",
    "revision": "8fe52d3bf9e4dbb2000a108ca4e19a46"
  },
  {
    "url": "fonts/less/_list.less",
    "revision": "1d65d467e8bbae507fcd0a80945965b7"
  },
  {
    "url": "fonts/less/_mixins.less",
    "revision": "a7fa063476ba6db5346f7330ac3f0b41"
  },
  {
    "url": "fonts/less/_rotated-flipped.less",
    "revision": "96a02c0efee0dcc6e2b331ea69f5cc27"
  },
  {
    "url": "fonts/less/_screen-reader.less",
    "revision": "0f881617264587bef0df6ce92253ecea"
  },
  {
    "url": "fonts/less/_shims.less",
    "revision": "f41c94ab8df3aada7906c017e8b36897"
  },
  {
    "url": "fonts/less/_stacked.less",
    "revision": "deda57b8b5e6122615676d99e1115cb9"
  },
  {
    "url": "fonts/less/_variables.less",
    "revision": "e9860f19a422fd27bf9aa8e6d846aad6"
  },
  {
    "url": "fonts/less/brands.less",
    "revision": "f5b4608c17b0cb68e41118dc193ee009"
  },
  {
    "url": "fonts/less/fontawesome.less",
    "revision": "5828e2c9714fc9c94e82c093e86bffe6"
  },
  {
    "url": "fonts/less/regular.less",
    "revision": "4ba3a936b2eeefd1c69966106a99d5e6"
  },
  {
    "url": "fonts/less/solid.less",
    "revision": "898b4bf0b3135ed141e636309b1fed05"
  },
  {
    "url": "fonts/less/v4-shims.less",
    "revision": "ef38ebc43219264f8c39a796f9258cb6"
  },
  {
    "url": "fonts/LICENSE.txt",
    "revision": "a26077e534d7a5b2bbf9c0fa32aad750"
  },
  {
    "url": "fonts/metadata/categories.yml",
    "revision": "be0aa2d015199df417c3efbcb1267f6e"
  },
  {
    "url": "fonts/metadata/icons.yml",
    "revision": "261fc0aa5a5647399275390fccff85f1"
  },
  {
    "url": "fonts/metadata/shims.json",
    "revision": "1aa8ecceac4a17bfc6070129f937f012"
  },
  {
    "url": "fonts/metadata/shims.yml",
    "revision": "2dc4c50caefccbfac431e140dc0dc5f1"
  },
  {
    "url": "fonts/metadata/sponsors.yml",
    "revision": "4114f23a21ac27d38ed120a8da8fe800"
  },
  {
    "url": "fonts/scss/_animated.scss",
    "revision": "992453b341bee5e9d63562bdf68bf5da"
  },
  {
    "url": "fonts/scss/_bordered-pulled.scss",
    "revision": "7437104ba89f8110cf86ce53b8957f71"
  },
  {
    "url": "fonts/scss/_core.scss",
    "revision": "f7c8c00a50d69b4fe135dba09e511123"
  },
  {
    "url": "fonts/scss/_fixed-width.scss",
    "revision": "e52b0377dc3347ac4db3adf75485ad52"
  },
  {
    "url": "fonts/scss/_icons.scss",
    "revision": "f963093bcb9a155d63dc1b148f0133c7"
  },
  {
    "url": "fonts/scss/_larger.scss",
    "revision": "dd70b195f23b6aa62debdbaab018a75b"
  },
  {
    "url": "fonts/scss/_list.scss",
    "revision": "07930141d534140cea5527018bdc726c"
  },
  {
    "url": "fonts/scss/_mixins.scss",
    "revision": "df40bc4d64a720dcb611b911b740b1f9"
  },
  {
    "url": "fonts/scss/_rotated-flipped.scss",
    "revision": "a74bcad45d849b2682f1778dfa11713f"
  },
  {
    "url": "fonts/scss/_screen-reader.scss",
    "revision": "fa45b2d8ef7113ee7893ea60d7976e6c"
  },
  {
    "url": "fonts/scss/_shims.scss",
    "revision": "62a3387f3ecbd5679bff59972e585576"
  },
  {
    "url": "fonts/scss/_stacked.scss",
    "revision": "b4f1bb74796804022df72c8acd80797d"
  },
  {
    "url": "fonts/scss/_variables.scss",
    "revision": "5be96bba9634174e649595ee025ea51b"
  },
  {
    "url": "fonts/scss/brands.scss",
    "revision": "06f8d6f2c4ee7ce917e6669249ede5a2"
  },
  {
    "url": "fonts/scss/fontawesome.scss",
    "revision": "9da50fdc934b2fef783498c319774954"
  },
  {
    "url": "fonts/scss/regular.scss",
    "revision": "d74e9364837eb3937c1edecd83025828"
  },
  {
    "url": "fonts/scss/solid.scss",
    "revision": "e8f14d0b6a2b88879c79634736e02184"
  },
  {
    "url": "fonts/scss/v4-shims.scss",
    "revision": "4b280e29c69620ed451ed97d3eb9a728"
  },
  {
    "url": "fonts/sprites/brands.svg",
    "revision": "3b612dc016ba193746a9d3e8a5155869"
  },
  {
    "url": "fonts/sprites/regular.svg",
    "revision": "0d48c07a612c54c08ef93dff3e8f9abf"
  },
  {
    "url": "fonts/sprites/solid.svg",
    "revision": "a0afe2fd98a868ababeae52221998fb8"
  },
  {
    "url": "fonts/webfonts/fa-brands-400.eot",
    "revision": "9b6c8da3c489424e2b3e9c9fb6314b37"
  },
  {
    "url": "fonts/webfonts/fa-brands-400.svg",
    "revision": "b5472631dbace30d549357ec325b9c62"
  },
  {
    "url": "fonts/webfonts/fa-brands-400.ttf",
    "revision": "947b9537bc0fecc8130d48eb753495a1"
  },
  {
    "url": "fonts/webfonts/fa-brands-400.woff",
    "revision": "7b464e274bc331f9a765d765359635a5"
  },
  {
    "url": "fonts/webfonts/fa-brands-400.woff2",
    "revision": "48461ea4e797c9774dabb4a0440d2f56"
  },
  {
    "url": "fonts/webfonts/fa-regular-400.eot",
    "revision": "7422060ca379ee9939d3b687d072acad"
  },
  {
    "url": "fonts/webfonts/fa-regular-400.svg",
    "revision": "b5a61b229c9c92a6ac21f5b0e3c6e9f1"
  },
  {
    "url": "fonts/webfonts/fa-regular-400.ttf",
    "revision": "73fe7f1effbf382f499831a0a9f18626"
  },
  {
    "url": "fonts/webfonts/fa-regular-400.woff",
    "revision": "381af09a1366b6c2ae65eac5dd6f0588"
  },
  {
    "url": "fonts/webfonts/fa-regular-400.woff2",
    "revision": "949a2b066ec37f5a384712fc7beaf2f1"
  },
  {
    "url": "fonts/webfonts/fa-solid-900.eot",
    "revision": "70e65a7d34902f2c350816ecfe2f6492"
  },
  {
    "url": "fonts/webfonts/fa-solid-900.svg",
    "revision": "38508b2e7fac045869a86a15936433f7"
  },
  {
    "url": "fonts/webfonts/fa-solid-900.ttf",
    "revision": "0079a0ab6bec4da7d6e16f2a2e87cd71"
  },
  {
    "url": "fonts/webfonts/fa-solid-900.woff",
    "revision": "815694de1120d6c1e9d1f0895ee81056"
  },
  {
    "url": "fonts/webfonts/fa-solid-900.woff2",
    "revision": "14a08198ec7d1eb96d515362293fed36"
  },
  {
    "url": "footer.php",
    "revision": "e4ae50548bc988a45f374bc69c5ab3f1"
  },
  {
    "url": "header.php",
    "revision": "3dbbc8b662e7aa9aef8a6e5c80deb60a"
  },
  {
    "url": "images/2.png",
    "revision": "2cae2f2aed22919650bd8850be15fc4f"
  },
  {
    "url": "images/ath.png",
    "revision": "00c888ee2bbc4632b82b8adf150b38b9"
  },
  {
    "url": "images/careers/1.png",
    "revision": "415004cbe6d718935f7d9de4fbe82a52"
  },
  {
    "url": "images/careers/2.png",
    "revision": "094367a57750a8841abf8a72a1bdf602"
  },
  {
    "url": "images/careers/3.png",
    "revision": "794b18881048ab2b133a85f08b1eb504"
  },
  {
    "url": "images/careers/4.png",
    "revision": "a89057ef7aac2ceb4047629a1d307b03"
  },
  {
    "url": "images/demo_img.png",
    "revision": "71786539352a7b1534f7898ca394165d"
  },
  {
    "url": "images/empty.png",
    "revision": "71a50dbba44c78128b221b7df7bb51f1"
  },
  {
    "url": "images/framework/activity.png",
    "revision": "3a6c5dac60c9505d441954eaf5f3c779"
  },
  {
    "url": "images/framework/AjaxLoader.gif",
    "revision": "5b8b06c052cac80413d62e5c45f9f37b"
  },
  {
    "url": "images/framework/deco-slash.png",
    "revision": "111cfb16a7f6e7ba506c006a2ec9b49a"
  },
  {
    "url": "images/framework/deco-zig.png",
    "revision": "247a18843394c92b7a35f12e28f1c633"
  },
  {
    "url": "images/framework/grabbing.png",
    "revision": "d817e1dba5bd5d891d0504bf1715807b"
  },
  {
    "url": "images/framework/icons.png",
    "revision": "486f0204fc9b0f4a11ae2b5e484667ae"
  },
  {
    "url": "images/framework/icons.svg",
    "revision": "5d6e0255a7862551b3a3afea8568f305"
  },
  {
    "url": "images/framework/loader.gif",
    "revision": "074175b89d476152242b7e2de7c038ba"
  },
  {
    "url": "images/framework/page-loader.gif",
    "revision": "b53c6087b227db51c4c77115b294b656"
  },
  {
    "url": "images/framework/pattern_1.png",
    "revision": "e81c8129adb180a486d94cc796352ccc"
  },
  {
    "url": "images/framework/pay-1.png",
    "revision": "66e1787422848ddfa12ce375dd95e50c"
  },
  {
    "url": "images/framework/pay-2.png",
    "revision": "5da09ed4ff70854d1498a4316560ec7c"
  },
  {
    "url": "images/framework/pay-3.png",
    "revision": "77abf5c6fe9a8c9c2e92d75454235746"
  },
  {
    "url": "images/framework/pay-4.png",
    "revision": "db4daa8a1ab4a088278bf1e5dfcdbb59"
  },
  {
    "url": "images/framework/pay-5.png",
    "revision": "9b8dedf9cb412a1fc8a53fc170c4ecae"
  },
  {
    "url": "images/framework/preload.gif",
    "revision": "ff59fac54cc0d54022ed864da7d66e12"
  },
  {
    "url": "images/framework/puff.svg",
    "revision": "27e2ef144c05cb180a1dc9c34fa9f3d6"
  },
  {
    "url": "images/icon.png",
    "revision": "8e56e5d2534407e7b649261c199921e1"
  },
  {
    "url": "images/icons/1.png",
    "revision": "40f5fd857001bb8514f401228f3b780b"
  },
  {
    "url": "images/icons/10.png",
    "revision": "c1750471b468a5fb3fe5548fbd9f5b6a"
  },
  {
    "url": "images/icons/11.png",
    "revision": "3d0aaf03d0b9a35a648539661fa3a997"
  },
  {
    "url": "images/icons/12.png",
    "revision": "099e5049cc93fb3ae54bcd434754ade7"
  },
  {
    "url": "images/icons/13.png",
    "revision": "c89ec76d56387d22a7b0f6a055ab2a6b"
  },
  {
    "url": "images/icons/14.png",
    "revision": "38c7d26770aa07b3d4ad0c9755446f8f"
  },
  {
    "url": "images/icons/15.png",
    "revision": "4c77ca7937bf4f16fdda57cf3c5169bf"
  },
  {
    "url": "images/icons/16.png",
    "revision": "56bdf1901aaeaac5a5b156077aa765f7"
  },
  {
    "url": "images/icons/17.png",
    "revision": "6a7f7c76e9873dfc947a3c8897112698"
  },
  {
    "url": "images/icons/18.png",
    "revision": "8a64d3b3356b5cbf9f53d514360e559c"
  },
  {
    "url": "images/icons/19.png",
    "revision": "d16335849ca81bb7d65f72742dbb1224"
  },
  {
    "url": "images/icons/2.png",
    "revision": "48e21dc4c8e82a817d362638ac39e944"
  },
  {
    "url": "images/icons/3.png",
    "revision": "23dcee5dcaf41d38cd7e7fef4703b537"
  },
  {
    "url": "images/icons/4.png",
    "revision": "5a2d2aeaf5dfc798ef1374bd60036449"
  },
  {
    "url": "images/icons/5.png",
    "revision": "cbb044255c2206ad527f748682d1a699"
  },
  {
    "url": "images/icons/6.png",
    "revision": "9a042e99756fd3aff5815fb2f7e96a1d"
  },
  {
    "url": "images/icons/7.png",
    "revision": "4e9494b397b378b4e153d97dc42524e5"
  },
  {
    "url": "images/icons/8.png",
    "revision": "05cd8a5375b91948d19faac9f9f969e4"
  },
  {
    "url": "images/icons/9.png",
    "revision": "c063316fcbc9007644e9492454f436f0"
  },
  {
    "url": "images/icons/license.txt",
    "revision": "49de36be4e05d61d60317f2fcfb341e8"
  },
//  {
//    "url": "images/pictures_vertical/bg-perspective.png",
//    "revision": "ab2f1a594908bccc8875f04e9893a8e2"
//  },
//  {
//    "url": "images/pictures_vertical/bg0.jpg",
//    "revision": "74881b6c0047c2d597c4f91ff3a9a856"
//  },
//  {
//    "url": "images/pictures_vertical/bg1.jpg",
//    "revision": "152c6dbf6c2b5576cc0dbd3e0c7d232d"
//  },
//  {
//    "url": "images/pictures_vertical/bg10.jpg",
//    "revision": "f80c6632ece61bbba1a03334d513f7d1"
//  },
//  {
//    "url": "images/pictures_vertical/bg11.jpg",
//    "revision": "a09d653328b7fcb156df7ec993cd1376"
//  },
//  {
//    "url": "images/pictures_vertical/bg2.jpg",
//    "revision": "fbdcf227d740eeb4eae30035d1dbe76f"
//  },
//  {
//    "url": "images/pictures_vertical/bg3.jpg",
//    "revision": "37d6f2dabc44871903bdb0408d0f7373"
//  },
//  {
//    "url": "images/pictures_vertical/bg4.jpg",
//    "revision": "9b500d08e1969572aca514ebd081b89b"
//  },
//  {
//    "url": "images/pictures_vertical/bg5.jpg",
//    "revision": "f27480c0271bd9a18fff59e59dc3ac40"
//  },
//  {
//    "url": "images/pictures_vertical/bg6.jpg",
//    "revision": "b8bc4a1548df0d807eb42290f733f022"
//  },
//  {
//    "url": "images/pictures_vertical/bg7.jpg",
//    "revision": "f1bb9497b15a1e01a026d1ba4fbd925e"
//  },
//  {
//    "url": "images/pictures_vertical/bg8.jpg",
//    "revision": "6d3018f16ea90ac969ba46d991697d81"
//  },
//  {
//    "url": "images/pictures_vertical/bg9.jpg",
//    "revision": "af0db5198fbf048cd6f738b38359f509"
//  },
//  {
//    "url": "images/pictures/0.jpg",
//    "revision": "7ee4ae67379b45d3b298d703143b1b90"
//  },
//  {
//    "url": "images/pictures/0l.jpg",
//    "revision": "71c4438c6f5a51db1316e5912d49a54f"
//  },
//  {
//    "url": "images/pictures/0s.png",
//    "revision": "48fefc8632dabfacdbe0f47ecb057b46"
//  },
//  {
//    "url": "images/pictures/0t.jpg",
//    "revision": "68b7b86faa32451dc3635ba7429e1927"
//  },
//  {
//    "url": "images/pictures/1.jpg",
//    "revision": "c2238005c524a4796752b2bbeb3c24ca"
//  },
//  {
//    "url": "images/pictures/10.jpg",
//    "revision": "41e6cf1d60c0e50b64281e578ecdbdc4"
//  },
//  {
//    "url": "images/pictures/10l.jpg",
//    "revision": "c46f910fdcdd2396042cda111d947427"
//  },
//  {
//    "url": "images/pictures/10lq.jpg",
//    "revision": "b55e8dd9028f62c27b13ee41f00b4828"
//  },
//  {
//    "url": "images/pictures/10m.jpg",
//    "revision": "2464dd5dc4bfc5ffe2e62452d1dcfdc1"
//  },
//  {
//    "url": "images/pictures/10s.jpg",
//    "revision": "28aa7ad9cbaa329500f614bceb3a8b24"
//  },
//  {
//    "url": "images/pictures/10t.jpg",
//    "revision": "fb2260837c4cff770ae234f732cc12c0"
//  },
//  {
//    "url": "images/pictures/10w.jpg",
//    "revision": "fed95777046a52f25c72554aa1541650"
//  },
//  {
//    "url": "images/pictures/11.jpg",
//    "revision": "3d6c98ba4d33689118a6c673bd6dbac9"
//  },
//  {
//    "url": "images/pictures/11l.jpg",
//    "revision": "ded50ad4aff96d1844d1d0a3f5b62322"
//  },
//  {
//    "url": "images/pictures/11lq.jpg",
//    "revision": "2488f22936780fa7a669767fcdb611ac"
//  },
//  {
//    "url": "images/pictures/11m.jpg",
//    "revision": "477f6345aa3c1571b007cfab8ef71300"
//  },
//  {
//    "url": "images/pictures/11s.jpg",
//    "revision": "2b3c0da8a893997a3d66ffde00ed5e61"
//  },
//  {
//    "url": "images/pictures/11t.jpg",
//    "revision": "72f09ad248dd47d2564e50626b191392"
//  },
//  {
//    "url": "images/pictures/11w.jpg",
//    "revision": "f31b8b88db9f3fc72ffd7115db02661e"
//  },
//  {
//    "url": "images/pictures/12.jpg",
//    "revision": "5d9f19462f1d39e3af6a0057c0409d2a"
//  },
//  {
//    "url": "images/pictures/12l.jpg",
//    "revision": "d14b6d04849f56756aa7f11f105352df"
//  },
//  {
//    "url": "images/pictures/12lq.jpg",
//    "revision": "642331b9a9b094a91fab922120edd540"
//  },
//  {
//    "url": "images/pictures/12m.jpg",
//    "revision": "c882dfa371d419add1cfa794c8e9418d"
//  },
//  {
//    "url": "images/pictures/12s.jpg",
//    "revision": "895ac1f50d127ab6ddf8f033fc7adea8"
//  },
//  {
//    "url": "images/pictures/12t.jpg",
//    "revision": "fe7bb91e7e77cb7119127119898ca825"
//  },
//  {
//    "url": "images/pictures/12w.jpg",
//    "revision": "e0e5c4424b8d5a0e578ea10f208771fd"
//  },
//  {
//    "url": "images/pictures/13.jpg",
//    "revision": "5d5a354e0b558e2ad3287368903d75b8"
//  },
//  {
//    "url": "images/pictures/13l.jpg",
//    "revision": "b2aae48cffd78382ce6914c6f3ebfdd5"
//  },
//  {
//    "url": "images/pictures/13lq.jpg",
//    "revision": "5912a5ff3aaa277b2c66822be020b301"
//  },
//  {
//    "url": "images/pictures/13m.jpg",
//    "revision": "c194c6d5020d6f92bdc02401dea682f3"
//  },
//  {
//    "url": "images/pictures/13s.jpg",
//    "revision": "23d0ff99ac48f9e9228bb73d2ae6f93b"
//  },
//  {
//    "url": "images/pictures/13t.jpg",
//    "revision": "69371876441b60f00017b78a657e661f"
//  },
//  {
//    "url": "images/pictures/13w.jpg",
//    "revision": "2d87646f4535f5118b4ecabb7c8ca6ab"
//  },
//  {
//    "url": "images/pictures/14.jpg",
//    "revision": "10032d400e79932271a0ed3285623350"
//  },
//  {
//    "url": "images/pictures/14l.jpg",
//    "revision": "59ea35b1663746d99dfc0ec4124e93da"
//  },
//  {
//    "url": "images/pictures/14lq.jpg",
//    "revision": "13ba69cea6ddafb5f3f798e604c31661"
//  },
//  {
//    "url": "images/pictures/14m.jpg",
//    "revision": "17596c56a01a173afec766253d871eb7"
//  },
//  {
//    "url": "images/pictures/14s.jpg",
//    "revision": "b798c0f810a6782db614a174984dea7d"
//  },
//  {
//    "url": "images/pictures/14t.jpg",
//    "revision": "9a00b48b40e7abb340b54a5f4cfa824a"
//  },
//  {
//    "url": "images/pictures/14w.jpg",
//    "revision": "7ffe7ec3ae5bcb14871944d635a8688b"
//  },
//  {
//    "url": "images/pictures/15.jpg",
//    "revision": "4ec1688c52bdb4262f5cabf69a7549f2"
//  },
//  {
//    "url": "images/pictures/15l.jpg",
//    "revision": "7a3fe3acee6cf10f07665c2b774c7350"
//  },
//  {
//    "url": "images/pictures/15lq.jpg",
//    "revision": "972cfc4e172d450f2193bf74b12b19cc"
//  },
//  {
//    "url": "images/pictures/15m.jpg",
//    "revision": "834ab34e846b68b9706bcf0385712605"
//  },
//  {
//    "url": "images/pictures/15s.jpg",
//    "revision": "7919b81a8cd2ed680665a3ac65123d3c"
//  },
//  {
//    "url": "images/pictures/15t.jpg",
//    "revision": "1c5f36e0ece63a42028a4e6b959a03c5"
//  },
//  {
//    "url": "images/pictures/15w.jpg",
//    "revision": "4295cb12fe7793782e787380c4266ff2"
//  },
//  {
//    "url": "images/pictures/16.jpg",
//    "revision": "56452afbf842081440c91aa2a7242c00"
//  },
//  {
//    "url": "images/pictures/16l.jpg",
//    "revision": "d9b8893d217e6b70d04406895532cfe1"
//  },
//  {
//    "url": "images/pictures/16lq.jpg",
//    "revision": "fc3275d51f4d56363e6c7de06ff6d35c"
//  },
//  {
//    "url": "images/pictures/16m.jpg",
//    "revision": "ba49648796a47dabe04aabb765b724eb"
//  },
//  {
//    "url": "images/pictures/16s.jpg",
//    "revision": "6f6f36cdae73f056d91a43528d1234e9"
//  },
//  {
//    "url": "images/pictures/16t.jpg",
//    "revision": "0f933d6bb12585598e67722709a6d1d6"
//  },
//  {
//    "url": "images/pictures/16w.jpg",
//    "revision": "f850644ae0c3f61b0eefe2c9599e5ec4"
//  },
//  {
//    "url": "images/pictures/17.jpg",
//    "revision": "34a4ebd4886390167ea5c5fa9aac9f52"
//  },
//  {
//    "url": "images/pictures/17l.jpg",
//    "revision": "b6debab03f2b9ed59225168ce149de6b"
//  },
//  {
//    "url": "images/pictures/17lq.jpg",
//    "revision": "d706e32d46a869d256f73bb2920b729d"
//  },
//  {
//    "url": "images/pictures/17m.jpg",
//    "revision": "fdd20065aa9f5957d5bbc65db6d5ded9"
//  },
//  {
//    "url": "images/pictures/17s.jpg",
//    "revision": "1bde76c4a6ae195f9152406f00178b3c"
//  },
//  {
//    "url": "images/pictures/17t.jpg",
//    "revision": "b629e584e6c24b5603251ad5498e777b"
//  },
//  {
//    "url": "images/pictures/17w.jpg",
//    "revision": "b260a235b62bd41bdd739075833bc1b3"
//  },
//  {
//    "url": "images/pictures/18.jpg",
//    "revision": "49b0fe94ceb05ee3eadcfc8cd828d423"
//  },
//  {
//    "url": "images/pictures/18l.jpg",
//    "revision": "570a264310985f375d4ea251b7276e4a"
//  },
//  {
//    "url": "images/pictures/18lq.jpg",
//    "revision": "2556079ce84b6b188e561aa14e8dbfc4"
//  },
//  {
//    "url": "images/pictures/18m.jpg",
//    "revision": "a4bf1c03a558e4899163e4ff6de66dce"
//  },
//  {
//    "url": "images/pictures/18s.jpg",
//    "revision": "52c77899648e7dbd554917e4f8efb229"
//  },
//  {
//    "url": "images/pictures/18t.jpg",
//    "revision": "0315d4b3c1f654b2676c1c0c621476d2"
//  },
//  {
//    "url": "images/pictures/18w.jpg",
//    "revision": "79bd112d055f37595787d19e9e52bf87"
//  },
//  {
//    "url": "images/pictures/19.jpg",
//    "revision": "d02074cd0736b10e390cb17a0cb20655"
//  },
//  {
//    "url": "images/pictures/19l.jpg",
//    "revision": "d0aa0ce08c01b223cf119cdaa7aaa668"
//  },
//  {
//    "url": "images/pictures/19lq.jpg",
//    "revision": "f0a40cbda4b0dcdbd1f6131cc39d68e1"
//  },
//  {
//    "url": "images/pictures/19m.jpg",
//    "revision": "f7b1787cbe439495032ca6a52263e56c"
//  },
//  {
//    "url": "images/pictures/19s.jpg",
//    "revision": "8a490b420728e7782449491668a5ee22"
//  },
//  {
//    "url": "images/pictures/19t.jpg",
//    "revision": "3fc2954a687cac8377441e78e5295c44"
//  },
//  {
//    "url": "images/pictures/19w.jpg",
//    "revision": "686cf8a07210ac3662d94506f8327001"
//  },
//  {
//    "url": "images/pictures/1l.jpg",
//    "revision": "3e815a01beb831b3a230200330438f4f"
//  },
//  {
//    "url": "images/pictures/1lq.jpg",
//    "revision": "2232395895ffef64d75fbe52da879c7f"
//  },
//  {
//    "url": "images/pictures/1m.jpg",
//    "revision": "31f0c7ec1d49034341fc78909e59c960"
//  },
//  {
//    "url": "images/pictures/1s.jpg",
//    "revision": "b46086a47ac7df88072e5e2348ada00a"
//  },
//  {
//    "url": "images/pictures/1t.jpg",
//    "revision": "00ccfdcb82fbf88d16e5e4e7b4b66f65"
//  },
//  {
//    "url": "images/pictures/1w.jpg",
//    "revision": "cfd5b629ed6ef6d00b77d03a5b220d83"
//  },
//  {
//    "url": "images/pictures/2.jpg",
//    "revision": "002902186ab0edc968aed6cb69a7ee13"
//  },
//  {
//    "url": "images/pictures/20.jpg",
//    "revision": "fe081c05fa8f43ded2b7d6affb49ebb5"
//  },
//  {
//    "url": "images/pictures/20l.jpg",
//    "revision": "623e38599e645d51eecc84cea1fd6cd4"
//  },
//  {
//    "url": "images/pictures/20lq.jpg",
//    "revision": "391dded327c7efcf87a2a21c6e857b09"
//  },
//  {
//    "url": "images/pictures/20m.jpg",
//    "revision": "2980884b49862c8a3b5db1dc7b092c91"
//  },
//  {
//    "url": "images/pictures/20s.jpg",
//    "revision": "171b8c4382978e11bb0908d2351e2886"
//  },
//  {
//    "url": "images/pictures/20t.jpg",
//    "revision": "cbcaff1542bc76f7793fc5515d58886f"
//  },
//  {
//    "url": "images/pictures/20w.jpg",
//    "revision": "37d3f7995db506e821ad499cdd9bee23"
//  },
//  {
//    "url": "images/pictures/21.jpg",
//    "revision": "fdad9fb0f10e06ae18712a932ec03742"
//  },
//  {
//    "url": "images/pictures/21l.jpg",
//    "revision": "e8dc90065617629ccdc5d87142834393"
//  },
//  {
//    "url": "images/pictures/21lq.jpg",
//    "revision": "66a72c2a617236a7bdcf6f67111bb0bf"
//  },
//  {
//    "url": "images/pictures/21m.jpg",
//    "revision": "39371d6a8ed9e393c707b8973f299980"
//  },
//  {
//    "url": "images/pictures/21s.jpg",
//    "revision": "7c42abe96d1b44692c8679c53509fe56"
//  },
//  {
//    "url": "images/pictures/21t.jpg",
//    "revision": "011eb2562bbdc2325c7cc3bc7a215ee7"
//  },
//  {
//    "url": "images/pictures/21w.jpg",
//    "revision": "e55d31e068c64ae82e6ea60baf24caa9"
//  },
//  {
//    "url": "images/pictures/22.jpg",
//    "revision": "0971d199148a788062e3e1dc47645805"
//  },
//  {
//    "url": "images/pictures/22l.jpg",
//    "revision": "fbc81bfe56541c94268422d520aca215"
//  },
//  {
//    "url": "images/pictures/22lq.jpg",
//    "revision": "6daa4bef7dda9908058d7f973d948e1c"
//  },
//  {
//    "url": "images/pictures/22m.jpg",
//    "revision": "43fe188a0f025b363976ec5c6dc6f349"
//  },
//  {
//    "url": "images/pictures/22s.jpg",
//    "revision": "d55ecc6f905cf37f166c27deacac9f4b"
//  },
//  {
//    "url": "images/pictures/22t.jpg",
//    "revision": "91cafab96f421fd97dad25d419eb6ca0"
//  },
//  {
//    "url": "images/pictures/22w.jpg",
//    "revision": "912ceb0427af06b3e74d6a88ea776c50"
//  },
//  {
//    "url": "images/pictures/23.jpg",
//    "revision": "b37d318a338d73195826bc1b8a85acb5"
//  },
//  {
//    "url": "images/pictures/23l.jpg",
//    "revision": "0a1b6b30b57b5ac6f1e90c67476def7f"
//  },
//  {
//    "url": "images/pictures/23lq.jpg",
//    "revision": "7b0ac872b918bbd69e66671810c78b59"
//  },
//  {
//    "url": "images/pictures/23m.jpg",
//    "revision": "e92cbdb96556e1a1a94e6d7fc076ed6c"
//  },
//  {
//    "url": "images/pictures/23s.jpg",
//    "revision": "89daf751a60097a3be96a07880825a2b"
//  },
//  {
//    "url": "images/pictures/23t.jpg",
//    "revision": "fb7ed8fc7e6eb064f549b4fe71938078"
//  },
//  {
//    "url": "images/pictures/23w.jpg",
//    "revision": "027eae6eacf40f220ef74abb50d05735"
//  },
//  {
//    "url": "images/pictures/24.jpg",
//    "revision": "e23f4957547255b64c29085ed197311a"
//  },
//  {
//    "url": "images/pictures/24l.jpg",
//    "revision": "46d8b0bfc2724c36468ed42d6d978388"
//  },
//  {
//    "url": "images/pictures/24lq.jpg",
//    "revision": "b85c5be0b1f0b90f50322d1dde0c135b"
//  },
//  {
//    "url": "images/pictures/24m.jpg",
//    "revision": "a73499b8504ba884583608813a440a71"
//  },
//  {
//    "url": "images/pictures/24s.jpg",
//    "revision": "6343d20c5535f90a71c020555d24700b"
//  },
//  {
//    "url": "images/pictures/24t.jpg",
//    "revision": "709bc912b17d7d438b8417aa71522498"
//  },
//  {
//    "url": "images/pictures/24w.jpg",
//    "revision": "1cf65918b7d8f3e2090fd34e54834324"
//  },
//  {
//    "url": "images/pictures/25.jpg",
//    "revision": "c919cd9fd71d82e98b52f5555432b9dc"
//  },
//  {
//    "url": "images/pictures/25l.jpg",
//    "revision": "b8d7260488395c4282ec0d4d6be58ce3"
//  },
//  {
//    "url": "images/pictures/25lq.jpg",
//    "revision": "f2e993f0b1c1faccad4957d233705831"
//  },
//  {
//    "url": "images/pictures/25m.jpg",
//    "revision": "1963046302d21686b1fb3f0559d7ffa9"
//  },
//  {
//    "url": "images/pictures/25s.jpg",
//    "revision": "602622453f9ddd535311dcd678681c65"
//  },
//  {
//    "url": "images/pictures/25t.jpg",
//    "revision": "f4541d5c7f0542492162e1c57f60c866"
//  },
//  {
//    "url": "images/pictures/25w.jpg",
//    "revision": "cc1d662fe54ed154b8ca350db2362b5c"
//  },
//  {
//    "url": "images/pictures/26.jpg",
//    "revision": "23d5bdf2ad39abfcf122b810f23a4192"
//  },
//  {
//    "url": "images/pictures/26l.jpg",
//    "revision": "249f4626178f26c780f26500579ff7c9"
//  },
//  {
//    "url": "images/pictures/26lq.jpg",
//    "revision": "25d1ccfcedd92739488095a6b2b4fe2b"
//  },
//  {
//    "url": "images/pictures/26m.jpg",
//    "revision": "c1b1abc5129518d2c5494b6a3c60f8a8"
//  },
//  {
//    "url": "images/pictures/26s.jpg",
//    "revision": "d562a82b393c09371eba9b0741a2013f"
//  },
//  {
//    "url": "images/pictures/26t.jpg",
//    "revision": "130f4a35313de71f1188de9a39eec1ac"
//  },
//  {
//    "url": "images/pictures/26w.jpg",
//    "revision": "a64c274c5a36dafda240e2baecc4eb39"
//  },
//  {
//    "url": "images/pictures/27.jpg",
//    "revision": "3d7fb3a13dd04a1138d1fbfacd953945"
//  },
//  {
//    "url": "images/pictures/27l.jpg",
//    "revision": "e9b9538671b182adc2addcbd65b6a90a"
//  },
//  {
//    "url": "images/pictures/27lq.jpg",
//    "revision": "7084654481f79a4768cc2a2d7a8599d2"
//  },
//  {
//    "url": "images/pictures/27m.jpg",
//    "revision": "754c881ad171d251c7d18d106ee246d9"
//  },
//  {
//    "url": "images/pictures/27s.jpg",
//    "revision": "73aec21fc99bb1214724d6927a4444b6"
//  },
//  {
//    "url": "images/pictures/27t.jpg",
//    "revision": "5923033ef625569774926b9b02528141"
//  },
//  {
//    "url": "images/pictures/27w.jpg",
//    "revision": "c09e172d762c253f7e433c077dac8bb9"
//  },
//  {
//    "url": "images/pictures/28.jpg",
//    "revision": "8d742d2b575b63c07d699919403bd872"
//  },
//  {
//    "url": "images/pictures/28l.jpg",
//    "revision": "494227ce8eff77c3b94a6ea6cbb6c2db"
//  },
//  {
//    "url": "images/pictures/28lq.jpg",
//    "revision": "3b0991b3c16ba7f4a295e5912cd76113"
//  },
//  {
//    "url": "images/pictures/28m.jpg",
//    "revision": "714afd3f8d050a385e4a6f22e47b48a5"
//  },
//  {
//    "url": "images/pictures/28s.jpg",
//    "revision": "4b37855a88f807e3d9c8f373121da132"
//  },
//  {
//    "url": "images/pictures/28t.jpg",
//    "revision": "17c891f955df6026ea81e87946e63511"
//  },
//  {
//    "url": "images/pictures/28w.jpg",
//    "revision": "0224a176090ff0414c66925cfffd5ced"
//  },
//  {
//    "url": "images/pictures/29.jpg",
//    "revision": "74905d509c4a2b3ff462dd50f78b875c"
//  },
//  {
//    "url": "images/pictures/29l.jpg",
//    "revision": "1f6e60ed21feed7faf412a620438b29d"
//  },
//  {
//    "url": "images/pictures/29lq.jpg",
//    "revision": "460d296173df962b0ba8df1e788cca19"
//  },
//  {
//    "url": "images/pictures/29m.jpg",
//    "revision": "5aa21f9f7e5e781c9ead08d9a7f8a29c"
//  },
//  {
//    "url": "images/pictures/29s.jpg",
//    "revision": "e3bca4b1718d20454ba73a4874f7d903"
//  },
//  {
//    "url": "images/pictures/29t.jpg",
//    "revision": "67fa6acf83adb8a280c8cf98c8968d33"
//  },
//  {
//    "url": "images/pictures/29w.jpg",
//    "revision": "608ed4d46ab8aa7e2198107f63ef2edc"
//  },
//  {
//    "url": "images/pictures/2l.jpg",
//    "revision": "c7902ee65f3377321da8a95ed58deccf"
//  },
//  {
//    "url": "images/pictures/2lq.jpg",
//    "revision": "dc82c5aa237c4a37955e8482cc5075f7"
//  },
//  {
//    "url": "images/pictures/2m.jpg",
//    "revision": "6c62232652ad9bbdb22994b1eeac861a"
//  },
//  {
//    "url": "images/pictures/2s.jpg",
//    "revision": "08926fb8a833bb84ee86397c432244aa"
//  },
//  {
//    "url": "images/pictures/2t.jpg",
//    "revision": "a60351e0ec0401d30c42177050a722cd"
//  },
//  {
//    "url": "images/pictures/2w.jpg",
//    "revision": "a3c4c57d3688d7b225d98c6559b1d0eb"
//  },
//  {
//    "url": "images/pictures/3.jpg",
//    "revision": "0d964e4744e8f38394f66d3563345a33"
//  },
//  {
//    "url": "images/pictures/30.jpg",
//    "revision": "2cae832754f43488821971d8ea8a2bfa"
//  },
//  {
//    "url": "images/pictures/30l.jpg",
//    "revision": "60148a22b9225ead0a57b8c8939077da"
//  },
//  {
//    "url": "images/pictures/30lq.jpg",
//    "revision": "3cfa9c1078444432d4d9074d493a7655"
//  },
//  {
//    "url": "images/pictures/30m.jpg",
//    "revision": "82b57548291f59b1852aec4020a70a81"
//  },
//  {
//    "url": "images/pictures/30s.jpg",
//    "revision": "fe4d7191b2fe203a571f2d1306b2e621"
//  },
//  {
//    "url": "images/pictures/30t.jpg",
//    "revision": "7c3bebf97f9b36d96504c9c04b6fcb39"
//  },
//  {
//    "url": "images/pictures/30w.jpg",
//    "revision": "3d4e1ee1c5f4baea5bfab3959d1e1864"
//  },
//  {
//    "url": "images/pictures/31.jpg",
//    "revision": "bd1ba4bf138fbb27f6051a1ab8b4ae48"
//  },
//  {
//    "url": "images/pictures/31l.jpg",
//    "revision": "87a062ff167556473dc8876cf6767b25"
//  },
//  {
//    "url": "images/pictures/31lq.jpg",
//    "revision": "0d7aeedb15fb7021bae555294969955d"
//  },
//  {
//    "url": "images/pictures/31m.jpg",
//    "revision": "573284d46f0a2a2e99dea39603e44f2f"
//  },
//  {
//    "url": "images/pictures/31s.jpg",
//    "revision": "a93425172078146c5d94b50e4be4c7bc"
//  },
//  {
//    "url": "images/pictures/31t.jpg",
//    "revision": "7eeaa9a7e285fc058920faeea9c957ce"
//  },
//  {
//    "url": "images/pictures/31w.jpg",
//    "revision": "f46925836fa52398f44820447436e573"
//  },
//  {
//    "url": "images/pictures/32.jpg",
//    "revision": "f4f7864432ac2b664f983466d54168c6"
//  },
//  {
//    "url": "images/pictures/32l.jpg",
//    "revision": "3919a8c7ba65054393bf2edb3e03713b"
//  },
//  {
//    "url": "images/pictures/32lq.jpg",
//    "revision": "a8abbc93d8dac8ef2f6eb89f80eeb9a9"
//  },
//  {
//    "url": "images/pictures/32m.jpg",
//    "revision": "e9e04b3b849d3bd3dab783de950191cf"
//  },
//  {
//    "url": "images/pictures/32s.jpg",
//    "revision": "e4cbbd7495f1df3c7b8b10f7452f5ec0"
//  },
//  {
//    "url": "images/pictures/32t.jpg",
//    "revision": "b2258792298ee9395e8d655217e63390"
//  },
//  {
//    "url": "images/pictures/32w.jpg",
//    "revision": "ff9a60e4290fda9ce0d81e86948f1207"
//  },
//  {
//    "url": "images/pictures/3l.jpg",
//    "revision": "76d9ce51116821988a6a554c8cf91293"
//  },
//  {
//    "url": "images/pictures/3lq.jpg",
//    "revision": "6efd6f0014504b7d9a121c50aa9eb672"
//  },
//  {
//    "url": "images/pictures/3m.jpg",
//    "revision": "adecc4551f7a8b6c13a14e44cdfdb19d"
//  },
//  {
//    "url": "images/pictures/3s.jpg",
//    "revision": "82c96698e81f5e4aad1e95fab228d1bb"
//  },
//  {
//    "url": "images/pictures/3t.jpg",
//    "revision": "1ec412f91e38d2a0390ccde803b39816"
//  },
//  {
//    "url": "images/pictures/3w.jpg",
//    "revision": "41e702f325c4dd71817db014e406c036"
//  },
//  {
//    "url": "images/pictures/4.jpg",
//    "revision": "73d656a6c55205d989c292c930aeeaa9"
//  },
//  {
//    "url": "images/pictures/4l.jpg",
//    "revision": "26d0cd9cc4eb209393583cb1aaf0ba97"
//  },
//  {
//    "url": "images/pictures/4lq.jpg",
//    "revision": "825dcee8bbfca15b94125e849a795227"
//  },
//  {
//    "url": "images/pictures/4m.jpg",
//    "revision": "86b2376b277078120b4bb7c8e877540f"
//  },
//  {
//    "url": "images/pictures/4s.jpg",
//    "revision": "bf9dae6194c37b94b232d8eaee94b158"
//  },
//  {
//    "url": "images/pictures/4t.jpg",
//    "revision": "62094c6d580cebcfe60c68c88f11922f"
//  },
//  {
//    "url": "images/pictures/4w.jpg",
//    "revision": "8b46b3584691007a43c018d34bb91688"
//  },
//  {
//    "url": "images/pictures/5.jpg",
//    "revision": "1cfdb953944a71b41cc5d42bb83fdefe"
//  },
//  {
//    "url": "images/pictures/5l.jpg",
//    "revision": "06cee6ae7985d39ad83f752d26bac889"
//  },
//  {
//    "url": "images/pictures/5lq.jpg",
//    "revision": "4771c27d362610c06c163c0aacd260f7"
//  },
//  {
//    "url": "images/pictures/5m.jpg",
//    "revision": "e04a487cf2f08870741e805a089aa31b"
//  },
//  {
//    "url": "images/pictures/5s.jpg",
//    "revision": "9e9e1373fa79217206434ff39bf8e485"
//  },
//  {
//    "url": "images/pictures/5t.jpg",
//    "revision": "63fc07d3acd58840686de6690c57cc09"
//  },
//  {
//    "url": "images/pictures/5w.jpg",
//    "revision": "c349d78b7df2b5e7bdedcb1fbf293fc4"
//  },
//  {
//    "url": "images/pictures/6.jpg",
//    "revision": "d9307ef31d6284970fb87056d7917cc8"
//  },
//  {
//    "url": "images/pictures/6l.jpg",
//    "revision": "da1e57f40a3a51f93b20bec66bc3db99"
//  },
//  {
//    "url": "images/pictures/6lq.jpg",
//    "revision": "441c80668e4726bbea9d79c360b34eb1"
//  },
//  {
//    "url": "images/pictures/6m.jpg",
//    "revision": "3bf7ff6ec84b18b53930e91c54b73ec7"
//  },
//  {
//    "url": "images/pictures/6s.jpg",
//    "revision": "b9351e1532c6296e64ead62efc30be9a"
//  },
//  {
//    "url": "images/pictures/6t.jpg",
//    "revision": "4310d1e13cfa65f393b1e04fe40a707a"
//  },
//  {
//    "url": "images/pictures/6w.jpg",
//    "revision": "e5535c5dcad813452db047e62481feed"
//  },
//  {
//    "url": "images/pictures/7.jpg",
//    "revision": "8703cc32c7b6799dc969ed379393f55f"
//  },
//  {
//    "url": "images/pictures/7l.jpg",
//    "revision": "99887bc9535571e6a80f780ac07ad3e6"
//  },
//  {
//    "url": "images/pictures/7lq.jpg",
//    "revision": "11fe68d168119c2ba4d46876564ce511"
//  },
//  {
//    "url": "images/pictures/7m.jpg",
//    "revision": "24f53a276e573bad1f4fc40eac905603"
//  },
//  {
//    "url": "images/pictures/7s.jpg",
//    "revision": "c07eb0b74dff020ccc6384425ee1063d"
//  },
//  {
//    "url": "images/pictures/7t.jpg",
//    "revision": "fd933571caf939bb0aca7b765b9df504"
//  },
//  {
//    "url": "images/pictures/7w.jpg",
//    "revision": "4b7a7c6aa7c0b97d2ddc2593d8539472"
//  },
//  {
//    "url": "images/pictures/8.jpg",
//    "revision": "3d5bcb3cadb47a064e293c824734f4f0"
//  },
//  {
//    "url": "images/pictures/8l.jpg",
//    "revision": "9a7b9cc2081082159960b8acba677054"
//  },
//  {
//    "url": "images/pictures/8lq.jpg",
//    "revision": "76ec2ec6ca35bc53c169cfbde1de79ef"
//  },
//  {
//    "url": "images/pictures/8m.jpg",
//    "revision": "aebc07da37a6dbe3e5c4cb2d2b3fa23e"
//  },
//  {
//    "url": "images/pictures/8s.jpg",
//    "revision": "2e266bc3ae3087767b36b25bcc02f0ab"
//  },
//  {
//    "url": "images/pictures/8t.jpg",
//    "revision": "b1266d369cf3ed7b2447bf6172f61037"
//  },
//  {
//    "url": "images/pictures/8w.jpg",
//    "revision": "b39f75a1e46a8091eff0d6256550900b"
//  },
//  {
//    "url": "images/pictures/9.jpg",
//    "revision": "723d945c9f231428cc0f77283b3bd11a"
//  },
//  {
//    "url": "images/pictures/9l.jpg",
//    "revision": "a12caba58c59bb7d59e63d7f9e3423df"
//  },
//  {
//    "url": "images/pictures/9lq.jpg",
//    "revision": "3f1c987771596dcf007474c1a19c1401"
//  },
//  {
//    "url": "images/pictures/9m.jpg",
//    "revision": "79bdb596291ccba8fb60a111774de314"
//  },
//  {
//    "url": "images/pictures/9s.jpg",
//    "revision": "993c1fb51d4abf6efb12f6649c698840"
//  },
//  {
//    "url": "images/pictures/9t.jpg",
//    "revision": "66ec47ab76c81b9cb768ad52e63f114a"
//  },
//  {
//    "url": "images/pictures/9w.jpg",
//    "revision": "82e4aa52b239bdfca1380735a856e0f9"
//  },
//  {
//    "url": "images/pictures/faces/1s.png",
//    "revision": "4ec060c3901c3793a48f0b0a51a732a6"
//  },
//  {
//    "url": "images/pictures/faces/1small.png",
//    "revision": "e430c2a1956972d7d86cecd88584a193"
//  },
//  {
//    "url": "images/pictures/faces/2s.png",
//    "revision": "4436ca02f52dbc72d08eab1be73b8bf9"
//  },
//  {
//    "url": "images/pictures/faces/2small.png",
//    "revision": "5b2650b89f2f8796fb79f00414f1f634"
//  },
//  {
//    "url": "images/pictures/faces/3s.png",
//    "revision": "fdce020a83d828b874da187ecaeafd20"
//  },
//  {
//    "url": "images/pictures/faces/3small.png",
//    "revision": "a1a5fddbb09832c33623c8623719b204"
//  },
//  {
//    "url": "images/pictures/faces/4s.png",
//    "revision": "ba228efadb9902eb881daa1e47a4d92d"
//  },
//  {
//    "url": "images/pictures/faces/4small.png",
//    "revision": "950916652de26baeacd4dc96a19a8377"
//  },
//  {
//    "url": "images/pictures/isolated/1.jpg",
//    "revision": "32984d8fc6531af08275b7eefb08de32"
//  },
//  {
//    "url": "images/pictures/isolated/10.jpg",
//    "revision": "f5eb2f08be403515a7f4947b9141f0f2"
//  },
//  {
//    "url": "images/pictures/isolated/10l.jpg",
//    "revision": "458f72b120c27db192eeb022363667df"
//  },
//  {
//    "url": "images/pictures/isolated/1l.jpg",
//    "revision": "b1f80875a01fbe148b2ac720f5426d98"
//  },
//  {
//    "url": "images/pictures/isolated/2.jpg",
//    "revision": "7f11ad5a42377e39920586474fd81d52"
//  },
//  {
//    "url": "images/pictures/isolated/2l.jpg",
//    "revision": "5d6adbca76ed8bd837a5e6fa414dcd5b"
//  },
//  {
//    "url": "images/pictures/isolated/3.jpg",
//    "revision": "cce8345cf837114398d88bb6dae26a10"
//  },
//  {
//    "url": "images/pictures/isolated/3l.jpg",
//    "revision": "e28375f737e66260e88e1b50d7d2e694"
//  },
//  {
//    "url": "images/pictures/isolated/4.jpg",
//    "revision": "bdeeb30fc68dde224827ef60e4614919"
//  },
//  {
//    "url": "images/pictures/isolated/4l.jpg",
//    "revision": "3341938dfb03a249707a7189c7ebf243"
//  },
//  {
//    "url": "images/pictures/isolated/5.jpg",
//    "revision": "e3b87aaf073a3e9089e5e1cdb5d28a5c"
//  },
//  {
//    "url": "images/pictures/isolated/6.jpg",
//    "revision": "99135ea3503baff0f1e4d2d97c5e62b2"
//  },
//  {
//    "url": "images/pictures/isolated/7.jpg",
//    "revision": "8341c2afd0fec52bb92eab6c39363df6"
//  },
//  {
//    "url": "images/pictures/isolated/8.jpg",
//    "revision": "6e74af87ef2440a623809381f1f21574"
//  },
//  {
//    "url": "images/pictures/isolated/8l.jpg",
//    "revision": "949979a18e75cec9cb73e69f20c2912b"
//  },
//  {
//    "url": "images/pictures/isolated/9.jpg",
//    "revision": "44a8d0effb94181c532b958a04d57db3"
//  },
//  {
//    "url": "images/pictures/isolated/9l.jpg",
//    "revision": "5b28b1f6e852d2afd5cbdf37cac14adc"
//  },
//  {
//    "url": "images/placeholders/1.png",
//    "revision": "871e146cb4bd08beff426f9dc99bc1b7"
//  },
//  {
//    "url": "images/placeholders/1a.png",
//    "revision": "6657822332bfba29c3914f0604925504"
//  },
//  {
//    "url": "images/placeholders/1b.png",
//    "revision": "3360506e800717b651dfb6e0d1873eb8"
//  },
//  {
//    "url": "images/placeholders/1w.png",
//    "revision": "2c02d81e469f64758e87ee273ecc39fc"
//  },
//  {
//    "url": "images/placeholders/2.png",
//    "revision": "d2fa1eba386c3dfab69f60f907f17fef"
//  },
//  {
//    "url": "images/placeholders/2a.png",
//    "revision": "2484de38f621e6b14ba81f9c1c2dbcca"
//  },
//  {
//    "url": "images/placeholders/2b.png",
//    "revision": "7a2d089646e0445d6ed7a4bbe7ea7186"
//  },
//  {
//    "url": "images/placeholders/2w.png",
//    "revision": "b82d9acfed61c539f842c2f8048deb91"
//  },
//  {
//    "url": "images/placeholders/3.png",
//    "revision": "ce3bc4722eb33d00a1c5cb93462838a0"
//  },
//  {
//    "url": "images/placeholders/3a.png",
//    "revision": "6214b470b8d1c9572a27c63c569c23ee"
//  },
//  {
//    "url": "images/placeholders/3b.png",
//    "revision": "6304c862390c5ae8e24540bf557f2c27"
//  },
//  {
//    "url": "images/placeholders/3w.png",
//    "revision": "9f16b213cca6a79dc64fb5be18c7846f"
//  },
//  {
//    "url": "images/placeholders/4.png",
//    "revision": "9574b57c1af7f3aaac8e7a8bc5a7d9ba"
//  },
//  {
//    "url": "images/placeholders/4a.png",
//    "revision": "bb949811535b291e5ccdd5c0dc5e6310"
//  },
//  {
//    "url": "images/placeholders/4b.png",
//    "revision": "8b194eae7afa498f07d0dbcf7949b43b"
//  },
//  {
//    "url": "images/placeholders/4c.png",
//    "revision": "46a8842a5e201d3e138f920121cf819e"
//  },
//  {
//    "url": "images/placeholders/4d.png",
//    "revision": "263858c88b582bfb256131881383aebf"
//  },
//  {
//    "url": "images/placeholders/5.png",
//    "revision": "08a1fcb26b6ef3787744b336bf2dad67"
//  },
//  {
//    "url": "images/placeholders/5a.png",
//    "revision": "6a1846c02fe504a921e15d16fbf6d268"
//  },
//  {
//    "url": "images/placeholders/5b.png",
//    "revision": "749043fc9b337cb53d5963e68515364f"
//  },
//  {
//    "url": "images/placeholders/6.png",
//    "revision": "6f8411236cd486f75933dcbc9dda277f"
//  },
//  {
//    "url": "images/placeholders/6a.png",
//    "revision": "ddc3d62bcd65c5158db391273de37194"
//  },
//  {
//    "url": "images/placeholders/7.png",
//    "revision": "581a1337b9011df1373f5def4a8080cd"
//  },
//  {
//    "url": "images/placeholders/7a.png",
//    "revision": "567158b9bfabb55d00f3501ef52c1c15"
//  },
//  {
//    "url": "images/preload-logo.png",
//    "revision": "a6b0f11aecbed48c9625897aab162cd0"
//  },
//  {
//    "url": "images/products/1.png",
//    "revision": "9720a5392c4c7e43833a56d41ca4f0d4"
//  },
//  {
//    "url": "images/products/2.png",
//    "revision": "cb4e8ccc8085baf7c0387a85432fc698"
//  },
//  {
//    "url": "images/products/3.png",
//    "revision": "836cb9feff94b1d3a7f47eb689deb853"
//  },
//  {
//    "url": "images/products/4.png",
//    "revision": "ec3901b91b31b335128667a05b615b09"
//  },
//  {
//    "url": "images/products/5.png",
//    "revision": "43b180c757806364ca177aad3b70675a"
//  },
//  {
//    "url": "images/products/6.png",
//    "revision": "7b41d5067a3f51b2def9e87bcfd8355e"
//  },
//  {
//    "url": "images/products/7.png",
//    "revision": "e4e946eecc65b61d961280539b3ff845"
//  },
//  {
//    "url": "images/products/walk_cut.png",
//    "revision": "b50d6f3b87b7fc638d4d162e3a643e48"
//  },
//  {
//    "url": "images/products/walk.png",
//    "revision": "cb9163a42580b0ecd01a9fbe772a12f3"
//  },
//  {
//    "url": "images/products/walk2_cut.png",
//    "revision": "daa03259c59210724d3ccd2d76c7b0f1"
//  },
//  {
//    "url": "images/products/walk2.png",
//    "revision": "254daa5d123c8f39d9ab47e34cab3ea8"
//  },
//  {
//    "url": "images/products/walk3_cut.png",
//    "revision": "9bae9190ef163f6ec51cf8219966c5f5"
//  },
//  {
//    "url": "images/products/walk3.png",
//    "revision": "e51924f63e1206eed58ef46d7c939e50"
//  },
//  {
//    "url": "images/products/walk4_cut.png",
//    "revision": "d86b08191bac30306bb180e369b43414"
//  },
//  {
//    "url": "images/products/walk4.png",
//    "revision": "b43a3e5cb5e07cf30689ca1aa09a60f3"
//  },
  {
    "url": "images/splash/android-chrome-192x192.png",
    "revision": "eec304dd1cc2ef5bb0a929fae1f7b407"
  },
  {
    "url": "images/splash/apple-touch-icon-114x114.png",
    "revision": "b7148850e500c73b4c7809e27f14b19d"
  },
  {
    "url": "images/splash/apple-touch-icon-120x120.png",
    "revision": "8e6bd6785186f039461b7703a36d762f"
  },
  {
    "url": "images/splash/apple-touch-icon-144x144.png",
    "revision": "8515d29cb0b75b2723a6b7a40ddd3f6c"
  },
  {
    "url": "images/splash/apple-touch-icon-152x152.png",
    "revision": "6b8877223c5608e375f06247bf86cdd9"
  },
  {
    "url": "images/splash/apple-touch-icon-180x180.png",
    "revision": "b5c1d0111209a237e914162b2575f8bc"
  },
  {
    "url": "images/splash/apple-touch-icon-196x196.png",
    "revision": "c81ce729e9517dffc846cf566e52c590"
  },
  {
    "url": "images/splash/apple-touch-icon-57x57.png",
    "revision": "a70901a7ec0bf3ef59e096308c90a4ba"
  },
  {
    "url": "images/splash/apple-touch-icon-60x60.png",
    "revision": "4c443e0e86644a6f00c5e29e44b17ebc"
  },
  {
    "url": "images/splash/apple-touch-icon-72x72.png",
    "revision": "3c1c4b0c3b860fcb77c2dbd70bada71f"
  },
  {
    "url": "images/splash/apple-touch-icon-76x76.png",
    "revision": "21deed38529e93c2b332fb8dc7af9a13"
  },
  {
    "url": "images/splash/favicon-16x16.png",
    "revision": "acc9f7243fa259647eea788cb9500840"
  },
  {
    "url": "images/splash/favicon-32x32.png",
    "revision": "893ff06a3e6f985e504889ce7407ca7a"
  },
  {
    "url": "images/splash/favicon-96x96.png",
    "revision": "38bf3e960a250230b315a20ad0c55152"
  },
  {
    "url": "images/splash/favicon.ico",
    "revision": "26cf54b2308ca8c42fd152a2fa66ee7f"
  },
  {
    "url": "images/splash/Thumbs.db",
    "revision": "05749e40221c54dca2e97c37469c1235"
  },
  {
    "url": "index.php",
    "revision": "612bef9e508383a2330ed5eaa97ef885"
  },
  {
    "url": "login.php",
    "revision": "10976aa85113990ffc5b4d53d00452a1"
  },
//  {
//    "url": "logout.php",
//    "revision": "a6562a1c9a37cf5ba28073fcc20c69ab"
//  },
  {
    "url": "main.php",
    "revision": "14d9b370774a2ee97bdecae28177e426"
  },
  {
    "url": "notfcation.php",
    "revision": "ea9622e73f111ca1c0ea136c144c2d85"
  },
  {
    "url": "orderDetails.php",
    "revision": "4d5d0a1ae295e0d8c2def2f552a7678c"
  },
  {
    "url": "orders.php",
    "revision": "8d819fa7e9b30b45d43f799cee92bf66"
  },
  {
    "url": "package-lock.json",
    "revision": "6ae5c0005ad3ed9cdf9e3803c59f5b68"
  },
  {
    "url": "php/_access.php",
    "revision": "642a2c7b7d8d668cb6e6b2c3fbac84ca"
  },
//  {
//    "url": "php/_charts.php",
//    "revision": "2206bf3824185b9cccc4b3cd7887af24"
//  },
  {
    "url": "php/_crpt.php",
    "revision": "f510024dacaf0a557315d5991fdc1d2f"
  },
//  {
//    "url": "php/_earnings.php",
//    "revision": "bb542bddfebb6ef812d892e1aa0d2da8"
//  },
//  {
//    "url": "php/_getOrder.php",
//    "revision": "0a0162249822ee02a04d48c69d27c637"
//  },
//  {
//    "url": "php/_getOrders.php",
//    "revision": "1a77f5b7a263eb85aa249b09b0504823"
//  },
//  {
//    "url": "php/_getOrderTrack.php",
//    "revision": "01d04b330128e1b1500ef654f12da7ce"
//  },
//  {
//    "url": "php/_getPospondedOrders.php",
//    "revision": "30cbd9517f2dd2de691dc8fbba3666ab"
//  },
//  {
//    "url": "php/_getProfile.php",
//    "revision": "863951c0c5247a5a4ee9c3cc63602d52"
//  },
//  {
//    "url": "php/_getReturnedOrders.php",
//    "revision": "c61010c7ba177b5b5bc943a53246331b"
//  },
//  {
//    "url": "php/_login.php",
//    "revision": "01a35c71bdaad7214775c800f83d7619"
//  },
//  {
//    "url": "php/_logout.php",
//    "revision": "84f6df22f5b466efa21c45e87075296f"
//  },
//  {
//    "url": "php/_orderChange.php",
//    "revision": "270a078c116af79c5dcd784976125e28"
//  },
//  {
//    "url": "php/_orderPosponded.php",
//    "revision": "88707993e5c7f09811b22baa2000b3b4"
//  },
//  {
//    "url": "php/_orderRecived.php",
//    "revision": "c2499703ae96a19d9fe642983304bd4e"
//  },
//  {
//    "url": "php/_orderRepalce.php",
//    "revision": "8c7c0526a75b6ff85d6b5364ef1777f0"
//  },
//  {
//    "url": "php/_orderReturned.php",
//    "revision": "e7058924739de728365f6bff384e59cd"
//  },
//  {
//    "url": "php/_updateProfile.php",
//    "revision": "d0c07513b98c77d221f6954fa2c44838"
//  },
  {
    "url": "php/contact.php",
    "revision": "a27142543526be39fec40bcdc5f169fa"
  },
  {
    "url": "php/dbconnection.php",
    "revision": "1744d69636dd45ec92a143089f5ee17c"
  },
  {
    "url": "posponded.php",
    "revision": "0d49c3174093077c80d172e80456521d"
  },
  {
    "url": "profile.php",
    "revision": "cb5f67367dfd278820997c430bdc642c"
  },
  {
    "url": "pwa/android-chrome-192x192.png",
    "revision": "ee857abf4d5ec20d77205067e9f4ca55"
  },
  {
    "url": "pwa/android-chrome-512x512.png",
    "revision": "06e39a925bf161fcd3bc2b3bebedf3e9"
  },
  {
    "url": "pwa/apple-touch-icon.png",
    "revision": "23926b32ec37e236dfe2faa4550e9f6e"
  },
  {
    "url": "pwa/browserconfig.xml",
    "revision": "61bfd064535af0c276bb63b3fd579733"
  },
  {
    "url": "pwa/favicon_package_v0.161.zip",
    "revision": "3b19636175ddf67669efe28521d2b8b3"
  },
  {
    "url": "pwa/favicon-16x16.png",
    "revision": "d47748f20a4a9a734bc9c14632cf4204"
  },
  {
    "url": "pwa/favicon-32x32.png",
    "revision": "ad45de3a158bf075efba1a75680c46c4"
  },
  {
    "url": "pwa/favicon.ico",
    "revision": "aa1b33c2f6a66cb486cd9ed227bf2d25"
  },
  {
    "url": "pwa/mstile-150x150.png",
    "revision": "edf1071e05533217da4887e5eba3e54e"
  },
  {
    "url": "pwa/safari-pinned-tab.svg",
    "revision": "e166c68b72ba8e9555e48dfab8061709"
  },
  {
    "url": "pwa/site.webmanifest",
    "revision": "0f30bc0572bad1506b5efd773b9491a9"
  },
  {
    "url": "returned.php",
    "revision": "80851c594bd8f1cbadbc8f8158ffc588"
  },
  {
    "url": "scripts/charts.js",
    "revision": "217cb5d4ea048de6bd91dbce1b3bc12e"
  },
  {
    "url": "scripts/custom.js",
    "revision": "5d60bce11d63a3fafad7d3a649b43b80"
  },
  {
    "url": "scripts/datapicker.js",
    "revision": "f5514b1ce3d12a9d2d3407f159ac9fcd"
  },
  {
    "url": "scripts/jquery.js",
    "revision": "a09e13ee94d51c524b7e2a728c7d4039"
  },
  {
    "url": "scripts/plugins.js",
    "revision": "afe29d50afa6a2a774de3181a9be58b8"
  },
  {
    "url": "scripts/polyfill.js",
    "revision": "5a2415672e22d366bda5aa34666acfdb"
  },
  {
    "url": "scripts/toast.js",
    "revision": "a1ce2af27ac95d616e573dc28a349185"
  },
  {
    "url": "scripts/vcard.vcf",
    "revision": "e1359316710b71d9ca6c8dbe769eb4da"
  },
  {
    "url": "styles/bootstrap.min.css",
    "revision": "8fe70898895271ddc62823321011273a"
  },
  {
    "url": "styles/datapicker.css",
    "revision": "34ce931548d96bf76eba4d398d406e19"
  },
  {
    "url": "styles/framework.css",
    "revision": "c434e575b197c45bbd58159f1089eecd"
  },
  {
    "url": "styles/style.css",
    "revision": "3fdffde65bc3d0e1b2d0239bf06aeee7"
  },
  {
    "url": "styles/toast.css",
    "revision": "5359db66b6839775e9a76577403a25e5"
  },
  {
    "url": "sw_reg.js",
    "revision": "c29810396690363ec48da5e1b26faf77"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
