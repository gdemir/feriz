<style type="text/css">
  #back-to-top {
    position: fixed;
    bottom: 40px;
    right: 40px;
    z-index: 9999;
    width: 32px;
    height: 32px;
    text-align: center;
    line-height: 30px;
    background: #c5c5c5;
    color: #444;
    cursor: pointer;
    border: 0;
    border-radius: 2px;
    text-decoration: none;
    transition: opacity 0.2s ease-out;
    opacity: 0;
  }
  #back-to-top:hover {
    background: #e9ebec;
  }
  #back-to-top.show {
    opacity: 1;
  }
</style>

<a href="#" id="back-to-top" title="Back to top">&uarr;</a>

<!-- back_to_top -->
<script type="text/javascript">
  if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
    backToTop = function () {
      var scrollTop = $(window).scrollTop();
      if (scrollTop > scrollTrigger) {
        $('#back-to-top').addClass('show');
      } else {
        $('#back-to-top').removeClass('show');
      }
    };
    backToTop();
    $(window).bind('scroll', function () {
      backToTop();
    });
    $('#back-to-top').on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, 800);
    });
  }
</script>
<!-- back_to_top end -->
