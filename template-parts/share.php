
<div id="share-posts" class="row">
    <div class="col share-post-col">
        <h4>Share This Post</h4>
        <div class="row share-icon">
            <div class="hvr-grow">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a>
            </div>
            <div class="hvr-grow">
                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i  class="fab fa-twitter-square"></i></a>
            </div>
            <div class="hvr-grow">
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-linkedin"></i></a>
            </div>
            <div>
                <div class="col copy-link-col hvr-grow">
                    <button onclick="CopyToClipboard('copytext');" class="copy-link-single" >Copy&nbsp;Article&nbsp;Link</button>
                    <p id="copied"></p>
                </div>
            </div>
                
        </div>
    </div>
</div>



