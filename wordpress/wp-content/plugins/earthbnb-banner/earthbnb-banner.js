jQuery(document).ready(function ($) {
  var isEarthbnbBannerTextSet =
    earthbnbBannerScriptParams.earthbnb_banner_text != "";
  var isEarthbnbBannerEnabledOnPage =
    !earthbnbBannerScriptParams.disabled_on_current_page;
  var isEarthbnbBannerVisible =
    isEarthbnbBannerTextSet && isEarthbnbBannerEnabledOnPage;

  if (isEarthbnbBannerVisible) {
    var closeButton =
      '<button id="earthbnb-banner-close-button" class="earthbnb-banner-button">&#x2715;</button>';
    $(
      '<div id="earthbnb-banner" class="earthbnb-banner"><div class="earthbnb-banner-text"><span>' +
        earthbnbBannerScriptParams.earthbnb_banner_text +
        "</span></div>" +
        closeButton +
        "</div>"
    ).prependTo("body");

    // Add close button function to close button
    function closeBanner() {
      if (document.getElementById("earthbnb-banner"))
        document.getElementById("earthbnb-banner").remove();
    }

    if (isEarthbnbBannerVisible) {
      document.getElementById("earthbnb-banner-close-button").onclick =
        function () {
          closeBanner();
        };
    }

    // Debug
    // Console log all variables
    console.log(earthbnbBannerScriptParams);
  }
});
