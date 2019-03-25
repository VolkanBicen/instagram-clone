<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Instagram (with Vue.js and CSSGram)</title>
  
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.9/css/all.css'>
<link rel='stylesheet' href='https://cssgram-cssgram.netdna-ssl.com/cssgram.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div id="app">
  <div class="app__phone">
    <div class="phone-header">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/Instagram_logo.png" />
      <p class="cancel-cta" v-if="step === 2 || step === 3" @click="goToHome">Cancel</p>
      <p class="next-cta" v-if="step === 2" @click="step++">Next</p>
      <p class="next-cta" v-if="step === 3" @click="sharePost">Share</p>
    </div>
    <transition name="fade">
      <div class="feed" v-if="step === 1" v-dragscroll.y="true">
        <instagram-post v-for="post in posts"
                        :post="post"
                        :key="posts.indexOf(post)">
        </instagram-post>
      </div>
    </transition>
    <div v-if="step === 2">
      <div class="selected-image"
           :class="filterType"
           :style="{ backgroundImage: 'url(' + image + ')' }"></div>
      <div class="filter-container" v-dragscroll.x="true">
        <filter-type v-for="filter in filters"
                     :filter="filter"
                     :image="image"
                     :key="filter.name">
        </filter-type>
      </div>
    </div>
    <div v-if="step === 3">
      <div class="selected-image"
           :class="filterType"
           :style="{ backgroundImage: 'url(' + image + ')' }"></div>
      <div class="caption-container">
        <textarea class="caption-input"
                  placeholder="Write a caption..."
                  type="text"
                  v-model="caption">
        </textarea>
      </div>
    </div>
    <div class="phone-footer">
      <div class="home-cta" @click="goToHome">
        <i class="fas fa-home fa-lg"></i>
      </div>
      <div class="upload-cta">
        <input type="file"
               name="file"
               id="file"
               class="inputfile"
               @change="fileUpload"
               v-model="fileInput"
               :disabled="step !== 1"/>
        <label for="file">
          <i class="far fa-plus-square fa-lg"></i>
        </label>
        <p v-if="step === 1">
          Click <a @click="uploadRandomImage">here for a random image!</a> or upload your own! <i class="fas fa-chevron-right"></i>
        </p>
      </div>
    </div>
  </div>
  <div class="details">
    <a class="button is-primary is-small is-info" v-if="!showDetails" @click="showDetails = !showDetails">Details</a>
    <ul v-else>
      <li>Navigate the feed by <span>dragging (or scrolling)</span></li>
      <li>Upload an image with <span><i class="far fa-plus-square fa-lg"></i></span></li>
      <li>Like a post with <span><i class="far fa-heart fa-lg"></i></span> or <span>double clicking an image</span></li>
    </ul>
  </div>
  <a href="https://twitter.com/djirdehh" target="_blank" class="twitter-section">
    <i class="fab fa-twitter" aria-hidden="true"></i>
  <a>
</div>

<!--  Prefetch random images -->
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/tropical_beach.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/downtown.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/cat.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/sushi.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/pug_personal.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/pineapple.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/tropical_ocean.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/velvet_monkey.jpg" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/codepen_logo.png" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/me2.png" />
<link rel="prefetch" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1211695/me_3.jpg" />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.min.js'></script>
<script src='https://unpkg.com/vue-dragscroll@1.3.1/dist/vue-dragscroll.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
