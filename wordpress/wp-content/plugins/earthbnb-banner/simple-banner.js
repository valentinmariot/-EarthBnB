jQuery(document).ready(function ($) {
  var isSimpleBannerTextSet = simpleBannerScriptParams.simple_banner_text != "";
  var isSimpleBannerEnabledOnPage =
    !simpleBannerScriptParams.disabled_on_current_page;
  var isSimpleBannerVisible =
    isSimpleBannerTextSet && isSimpleBannerEnabledOnPage;

  if (isSimpleBannerVisible) {
    var closeButton =
      '<button id="simple-banner-close-button" class="simple-banner-button">&#x2715;</button>';
    $(
      '<div id="simple-banner" class="simple-banner"><div class="simple-banner-text"><span>' +
        simpleBannerScriptParams.simple_banner_text +
        "</span></div>" +
        closeButton +
        "</div>"
    ).prependTo("body");

    // Add close button function to close button
    function closeBanner() {
      if (document.getElementById("simple-banner"))
        document.getElementById("simple-banner").remove();
    }

    if (isSimpleBannerVisible) {
      document.getElementById("simple-banner-close-button").onclick =
        function () {
          closeBanner();
        };
    }

    // Debug
    // Console log all variables
    console.log(simpleBannerScriptParams);
  }
});
