<h4 class="page-title"><?= t("home.articles"); ?></h4>
<ol class="breadcrumb text-right">
  <li><a href="/"><?= t("home.link"); ?></a></li>
  <li><a href="/home/articles"><?= t("home.articles"); ?></a></li>
  <li class="active"><?= $article->subject; ?></li>
</ol>


<div class="text-center">
  <h2><?= $article->subject; ?></h2>
  <h4>
    <span class="label label-default"><i class="fa fa-calendar"></i> <?= $article->created_at; ?></span>
  </h4>
</div>
<hr>

<?= $article->content; ?>

<hr>

<!-- Next_Previous start -->
<ul class="pager">

  <?php
  $next = Article::load()->where("created_at", $article->created_at, ">")->order("created_at", "DESC")->get_all();
  $next = $next[0];
  ?>

  <?php
  $previous = Article::load()->where("created_at", $article->created_at, "<")->order("created_at", "DESC")->get_all();
  $previous = $previous[0];
  ?>

  <?php if ($previous) { ?>
  <li class="previous">
    <a href="/home/articles/show/<?= $previous->id; ?>">&larr; <?= $previous->subject; ?></a>
  </li>
  <?php } ?>

  <?php if ($next) { ?>
  <li class="next">
    <a href="/home/articles/show/<?= $next->id; ?>"><?= $next->subject; ?> &rarr;</a>
  </li>
  <?php } ?>

</ul>
<!-- Next_Previous end -->

<!-- Disqus start -->
<?php if (($social_disqus = Setting::unique(["name" => "social_disqus"])->value) != "") { ?>

  <div id="disqus_thread"></div>

  <script type="text/javascript">
    (function() {
      var d = document, s = d.createElement('script');
      s.src = 'https://' + '<?= $social_disqus; ?>' + '.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
    })();
  </script>

  <noscript>
    Lütfen bu sayfaya gelen  <a href="http://disqus.com/?ref_noscript">yorumları</a>görmek için tarayıcınızın JavaScript desteğini etkinleştirin.
  </noscript>
  <?php } ?>
<!-- Disqus end -->