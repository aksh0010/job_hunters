<!DOCTYPE html>
<!-- saved from url=(0043)https://akshs-supercool-site.webflow.io/401 -->
<html
  data-wf-domain="akshs-supercool-site.webflow.io"
  data-wf-page="641509330afe7065e2762bf5"
  data-wf-site="6414df76fd358f9949037e89"
  class="w-mod-js wf-merriweather-n3-active wf-greatvibes-n4-active wf-inconsolata-n7-active wf-inconsolata-n4-active wf-exo-n3-active wf-exo-n7-active wf-exo-n8-active wf-exo-n2-active wf-exo-n6-active wf-exo-n5-active wf-exo-n1-active wf-exo-n9-active wf-exo-n4-active wf-exo-i2-active wf-exo-i6-active wf-exo-i5-active wf-exo-i4-active wf-exo-i3-active wf-exo-i7-active wf-exo-i1-active wf-exo-i8-active wf-exo-i9-active wf-merriweather-i3-active wf-merriweather-n4-active wf-merriweather-i4-active wf-merriweather-n7-active wf-merriweather-i7-active wf-merriweather-n9-active wf-merriweather-i9-active wf-active"
>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
      .wf-force-outline-none[tabindex="-1"]:focus {
        outline: none;
      }
    </style>
    <title>Protected page</title>
    <meta content="Protected page" property="og:title" />
    <meta content="Protected page" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link
      href="./hr_login_files/akshs-supercool-site.webflow.4092f09bd.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="https://fonts.googleapis.com/" rel="preconnect" />
    <link
      href="https://fonts.gstatic.com/"
      rel="preconnect"
      crossorigin="anonymous"
    />
    <script
      src="./hr_login_files/webfont.js.download"
      type="text/javascript"
    ></script>
    <link rel="stylesheet" href="./hr_login_files/css" media="all" />
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: [
            "Merriweather:300,300italic,400,400italic,700,700italic,900,900italic",
            "Great Vibes:400",
            "Inconsolata:400,700",
            "Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic",
          ],
        },
      });
    </script>
    <!--[if lt IE 9
      ]><script
        src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
        type="text/javascript"
      ></script
    ><![endif]-->
    <script type="text/javascript">
      !(function (o, c) {
        var n = c.documentElement,
          t = " w-mod-";
        (n.className += t + "js"),
          ("ontouchstart" in o ||
            (o.DocumentTouch && c instanceof DocumentTouch)) &&
            (n.className += t + "touch");
      })(window, document);
    </script>
    <link
      href="https://uploads-ssl.webflow.com/img/favicon.ico"
      rel="shortcut icon"
      type="image/x-icon"
    />
    <link
      href="https://uploads-ssl.webflow.com/img/webclip.png"
      rel="apple-touch-icon"
    />
  </head>
  <body data-new-gr-c-s-check-loaded="14.1103.0" data-gr-ext-installed="">
  <?php include './php/header.php';?>
    <div class="utility-page-wrap">
      <div class="utility-page-content w-password-page w-form">
        <form
          action="php/hr_login.php"
          method="post"
          id="email-form"
          name="email-form"
          data-name="Email Form"
          class="utility-page-form w-password-page"
          aria-label="Email Form"
        >
          <img
            src="./hr_login_files/utility-lock.ae54711958.svg"
            alt=""
            width="262"
            class="image-2"
          />
          <h2>Login</h2>
          <label for="field" class="w-password-page">HR Login forum</label
          ><input
            type="text"
            class="w-input"
            maxlength="256"
            name="email"
            data-name="Field 2"
            placeholder="Enter your email"
            id="field-2"
            required=""
          /><input
            type="password"
            class="w-password-page w-input"
            autofocus="true"
            maxlength="256"
            name="password"
            data-name="field"
            placeholder="Enter your password"
            id="pass"
          /><input
            type="submit"
            value="Sign in "
            data-wait="Please wait..."
            class="w-password-page w-button"
          />
          <div class="w-password-page w-form-fail">
            <div>Incorrect password. Please try again.</div>
          </div>
          <div style="display: none" class="w-password-page w-embed w-script">
            <input
              type="hidden"
              name="path"
              value="&lt;%WF_FORM_VALUE_PATH%&gt;"
            /><input
              type="hidden"
              name="page"
              value="&lt;%WF_FORM_VALUE_PAGE%&gt;"
            />
          </div>
          <div style="display: none" class="w-password-page w-embed w-script">
            <script type="application/javascript">
              (function _handlePasswordPageOnload() {
                if (/[?&]e=1(&|$)/.test(document.location.search)) {
                  document.querySelector(
                    ".w-password-page.w-form-fail"
                  ).style.display = "block";
                }
              })();
            </script>
          </div>
        </form>
      </div>
    </div>
    <script
      src="./hr_login_files/jquery-3.5.1.min.dc5e7f18c8.js.download"
      type="text/javascript"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script
      src="./hr_login_files/webflow.8ec0ab91f.js.download"
      type="text/javascript"
    ></script>
    <!--[if lte IE 9
      ]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script
    ><![endif]-->
  </body>
  <grammarly-desktop-integration
    data-grammarly-shadow-root="true"
  ></grammarly-desktop-integration>
</html>
