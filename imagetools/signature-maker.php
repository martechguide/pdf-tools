<!DOCTYPE html>
<html lang="en"> <?php include('admin/head.php'); ?> <?php include('admin/header.php'); ?> <?php include('admin/user.php'); ?> <div id="post-header" class="post-header">
    <div class="color-stripe row w-100 no-margin">
      <div class="bg-main-1"></div>
      <div class="bg-main-2"></div>
      <div class="bg-main-3"></div>
      <div class="bg-main-4"></div>
      <div class="bg-main-5"></div>
      <div class="bg-main-6"></div>
      <div class="bg-main-7"></div>
      <div class="bg-main-8"></div>
    </div>
  </div>
  <div class="bg-tool">
    <h1>Signature Generator Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and remove background for your images online.</strong>
  </div>
  <div class="color-stripe row w-100 no-margin">
    <div class="bg-main-1"></div>
    <div class="bg-main-2"></div>
    <div class="bg-main-3"></div>
    <div class="bg-main-4"></div>
    <div class="bg-main-5"></div>
    <div class="bg-main-6"></div>
    <div class="bg-main-7"></div>
    <div class="bg-main-8"></div>
  </div>
  <div id="ads"> <?php include('admin/ad1.php'); ?> </div>
  <div class="container-toolarea">
    <div class="text-center container pt-3">
      <svg width="64px" height="64px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <defs>
            <style>
              .cls-1 {
                fill: #0074ff;
              }
            </style>
          </defs>
          <title></title>
          <path class="cls-1" d="M32,41.5a6,6,0,0,1-1.78-.27l-22.5-7a6,6,0,1,1,3.56-11.46L32,29.22l7.52-2.34A2,2,0,1,1,40.7,30.7l-8.11,2.52a2,2,0,0,1-1.18,0L10.09,26.59a2,2,0,0,0-1.52.14,2,2,0,0,0-1,1.18,2,2,0,0,0,1.32,2.5l22.5,7a2,2,0,0,0,1.18,0l22.5-7a2,2,0,0,0-1.18-3.82L49.44,28a2,2,0,1,1-1.19-3.82l4.47-1.39a6,6,0,1,1,3.56,11.46l-22.5,7A6,6,0,0,1,32,41.5Z"></path>
        </g>
      </svg>
    </div>
  </div>
  <div class="toolarea">
    <link rel='stylesheet' id='signature_pad_page_template_styles-css' href='https://www.wisestamp.com/wp-content/themes/wisestamp/css/signature-pad-page-template.css?ver=08bdfa9499a4a6a4eb2d54e031aed8863eddcf01' type='text/css' media='all' />
    <style>
      .toggle-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 23px;
      }

      .toggle-switch .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .toggle-switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        border-radius: 34px;
      }

      .toggle-switch .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: #fff;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        border-radius: 50%;
      }

      .toggle-switch input:checked+.slider {
        background-color: #2196f3;
      }

      .toggle-switch input:focus+.slider {
        -webkit-box-shadow: 0 0 1px #2196f3;
        box-shadow: 0 0 1px #2196f3;
      }

      .toggle-switch input:checked+.slider:before {
        -webkit-transform: translateX(16px);
        transform: translateX(16px);
      }

      @-webkit-keyframes slideIn {
        0% {
          opacity: 0;
          -webkit-transform: translateX(-200%);
          transform: translateX(-200%);
        }

        100%,
        20% {
          opacity: 1;
          -webkit-transform: translateX(0);
          transform: translateX(0);
        }
      }

      @keyframes slideIn {
        0% {
          opacity: 0;
          -webkit-transform: translateX(-200%);
          transform: translateX(-200%);
        }

        100%,
        20% {
          opacity: 1;
          -webkit-transform: translateX(0);
          transform: translateX(0);
        }
      }

      @-webkit-keyframes fadeIn {
        from {
          opacity: 0;
          display: none;
        }

        to {
          opacity: 1;
        }
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          display: none;
        }

        to {
          opacity: 1;
        }
      }

      @-webkit-keyframes fadeOut {
        from {
          opacity: 1;
        }

        to {
          opacity: 0;
          display: none;
        }
      }

      @keyframes fadeOut {
        from {
          opacity: 1;
        }

        to {
          opacity: 0;
          display: none;
        }
      }

      @-webkit-keyframes bounceIn {
        0% {
          -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
        }

        100% {
          -webkit-transform: translateX(0);
          transform: translateX(0);
        }
      }

      @keyframes bounceIn {
        0% {
          -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
        }

        100% {
          -webkit-transform: translateX(0);
          transform: translateX(0);
        }
      }

      @-webkit-keyframes bounceInReverse {
        0% {
          -webkit-transform: translateX(110%);
          transform: translateX(110%);
        }

        100% {
          -webkit-transform: translateX(0);
          transform: translateX(0);
        }
      }

      @keyframes bounceInReverse {
        0% {
          -webkit-transform: translateX(110%);
          transform: translateX(110%);
        }

        100% {
          -webkit-transform: translateX(0);
          transform: translateX(0);
        }
      }

      .signature-pad-container {
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
      }

      .signature-pad-container .main-pad-wrapper {
        width: 100%;
        height: 0;
        padding-top: 45.52%;
        position: relative;
        -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        overflow: hidden;
        -ms-flex-item-align: center;
        align-self: center;
      }

      @media screen and (max-width: 575px) {
        .signature-pad-container .main-pad-wrapper {
          padding-top: 58.66%;
        }
      }

      .signature-pad-container .main-pad-wrapper .signature-pad-canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }

      .signature-pad-container .signature-pad-controls {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
      }

      .signature-pad-container .signature-pad-types {
        padding: 20px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        display: none;
      }

      .signature-pad-container .signature-pad-type {
        position: relative;
        width: 32px;
        height: 32px;
        margin-right: 15px;
        cursor: pointer;
      }

      .signature-pad-container .signature-pad-type input {
        visibility: hidden;
        cursor: pointer;
      }

      .signature-pad-container .signature-pad-type input::after {
        content: "";
        display: block;
        position: absolute;
        width: 32px;
        height: 32px;
        left: 0;
        top: 0;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        visibility: visible;
      }

      .signature-pad-container .signature-pad-type-handwritten input::after {
        background-image: url(../../assets/images/icons/icon-writing-stroke.png);
      }

      .signature-pad-container .signature-pad-type-handwritten input:checked::after {
        background-image: url(../../assets/images/icons/icon-writing-color.png);
      }

      .signature-pad-container .signature-pad-type-typed input::after {
        background-image: url(../../assets/images/icons/icon-typing-stroke.png);
      }

      .signature-pad-container .signature-pad-type-typed input:checked::after {
        background-image: url(../../assets/images/icons/icon-typing-color.png);
      }

      .signature-pad-container .signature-pad-modes {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 20px;
      }

      .signature-pad-container .signature-pad-modes .icon-box {
        position: relative;
      }

      .signature-pad-container .signature-pad-modes .icon-box svg {
        display: block;
        -webkit-transition: 0.3s linear;
        transition: 0.3s linear;
      }

      .signature-pad-container .signature-pad-modes .icon-box-writing {
        color: #f5467e;
      }

      .signature-pad-container .signature-pad-modes .icon {
        display: block;
        max-width: 28px;
        -webkit-transition: opacity 0.3s linear;
        transition: opacity 0.3s linear;
      }

      .signature-pad-container .signature-pad-modes.active .icon-box-writing {
        color: #08415c;
      }

      .signature-pad-container .signature-pad-modes.active .icon-box-typing {
        color: #f5467e;
      }

      .signature-pad-container .signature-pad-switch {
        display: block;
        position: relative;
        width: 60px;
        height: 30px;
        margin-inline: 10px;
      }

      .signature-pad-container .signature-pad-switch .signature-mode-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 30px;
        background-color: #e6e6e6;
        -webkit-transition: 0.4s;
        transition: 0.4s;
      }

      .signature-pad-container .signature-pad-switch .signature-mode-slider::before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 3px;
        bottom: 3px;
        border-radius: 50%;
        background-color: #fff;
        -webkit-transition: 0.4s;
        transition: 0.4s;
      }

      .signature-pad-container .signature-pad-switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      .signature-pad-container .signature-pad-switch input:checked+.signature-mode-slider {
        background-color: #f5467e;
      }

      .signature-pad-container .signature-pad-switch input:checked+.signature-mode-slider::before {
        -webkit-transform: translateX(30px);
        transform: translateX(30px);
      }

      .signature-pad-container .signature-pad-switch input:focus+.signature-mode-slider {
        -webkit-box-shadow: 0 0 1px #1cb4e7;
        box-shadow: 0 0 1px #1cb4e7;
      }

      .signature-pad-container .signature-pad-fonts {
        width: 100%;
        max-height: 0;
        display: grid;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding-inline: 20px;
        -webkit-transition: 0.4s;
        transition: 0.4s;
        overflow: hidden;
      }

      .signature-pad-container .signature-pad-fonts.active {
        max-height: 300px;
      }

      .signature-pad-container .signature-pad-fonts .label {
        display: inline-block;
        margin-bottom: 10px;
      }

      .signature-pad-container .signature-pad-fonts input.input-text {
        display: block;
        width: 100%;
        border: 1px solid #bdbdbd;
        border-radius: 8px;
        padding: 10px;
      }

      .signature-pad-container .signature-pad-font {
        position: relative;
        cursor: pointer;
      }

      .signature-pad-container .signature-pad-font input {
        position: absolute;
        visibility: hidden;
      }

      .signature-pad-container .signature-pad-font input:checked+span {
        border: 1px solid #1cb4e7;
      }

      .signature-pad-container .signature-pad-font span {
        position: relative;
        display: block;
        width: 100%;
        padding: 20px 30px;
        border-radius: 8px;
        border: 1px solid #f8f9fb;
        background-color: #f8f9fb;
        font-size: 2.5rem;
        text-align: center;
        font-family: inherit;
        -webkit-transition: border-color 0.3s linear;
        transition: border-color 0.3s linear;
      }

      .signature-pad-container .signature-pad-font[data-font="Great Vibes"] {
        font-family: "Great Vibes", serif;
      }

      .signature-pad-container .signature-pad-font[data-font="Ms Madi"] {
        font-family: "Ms Madi", serif;
      }

      .signature-pad-container .signature-pad-font[data-font="Sacramento"] {
        font-family: Sacramento, serif;
      }

      .signature-pad-container .signature-pad-font[data-font="Yellowtail"] {
        font-family: Yellowtail, serif;
      }

      .signature-pad-container .signature-pad-font[data-font="Waterfall"] {
        font-family: Waterfall, serif;
      }

      .signature-pad-container .signature-pad-actions {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: reverse;
        -ms-flex-direction: row-reverse;
        flex-direction: row-reverse;
        padding: 20px 20px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
      }

      .signature-pad-container .signature-pad-action {
        width: auto;
        margin-left: 8px;
      }

      .signature-pad-container .signature-pad-action * {
        cursor: pointer;
      }

      .signature-pad-container .signature-pad-action img {
        display: block;
        height: 100%;
        width: auto;
      }

      .signature-pad-container .signature-pad-action.colors {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: reverse;
        -ms-flex-direction: row-reverse;
        flex-direction: row-reverse;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
      }

      @media screen and (max-width: 575px) {
        .signature-pad-container .signature-pad-action.colors {
          -webkit-box-ordinal-group: 0;
          -ms-flex-order: -1;
          order: -1;
        }
      }

      .signature-pad-container .signature-pad-action.colors .signature-pad-color {
        height: 27px;
        width: 27px;
        border-radius: 50%;
        margin-left: 8px;
        padding: 2px;
      }

      .signature-pad-container .signature-pad-action.colors .signature-pad-color:after {
        content: "";
        display: block;
        background-color: currentColor;
        width: 100%;
        height: 100%;
        border-radius: 50%;
      }

      .signature-pad-container .signature-pad-action.colors .signature-pad-color.selected {
        border: 2px solid currentColor;
      }

      .signature-pad-container .signature-pad-action.checkboxes {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
      }

      .signature-pad-container .signature-pad-action.checkboxes .input-label {
        font-style: italic;
        font-weight: 400;
        font-size: 18px;
        margin-right: 5px;
      }

      @media screen and (max-width: 575px) {
        .signature-pad-container .signature-pad-action.checkboxes .input-label {
          font-size: 12px;
          max-width: 65px;
          display: inline-block;
          line-height: 1em;
          vertical-align: text-bottom;
        }
      }

      .signature-pad-container .signature-pad-export-buttons {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin: 50px 0;
      }

      @media screen and (max-width: 767px) {
        .signature-pad-container .signature-pad-export-buttons {
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
          -ms-flex-direction: column;
          flex-direction: column;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center;
          margin: 20px 0;
        }
      }

      .signature-pad-container .signature-pad-export-buttons .cta {
        background-color: #f5467e;
        border-color: #f5467e;
        color: #fff;
        margin: 0 15px;
        font-size: 16px;
      }

      @media screen and (max-width: 767px) {
        .signature-pad-container .signature-pad-export-buttons .cta {
          margin: 10px auto;
        }

        .signature-pad-container .signature-pad-export-buttons .cta.add-to-email {
          display: none;
        }
      }

      @media screen and (max-width: 575px) {
        .signature-pad-container .signature-pad-export-buttons .cta {
          margin: 5px auto;
        }
      }

      .signature-pad-container .signature-pad-export-buttons .cta.invert {
        background-color: #fff;
        color: #fff;
      }

      @media screen and (max-width: 991px) {
        .signature-pad-container .signature-pad-font span {
          padding: 15px 20px;
        }
      }

      @media screen and (max-width: 767px) {

        .signature-pad-container .signature-pad-actions,
        .signature-pad-container .signature-pad-modes {
          padding-block: 10px;
        }

        .signature-pad-container .signature-pad-controls {
          padding-top: 15px;
          -webkit-box-pack: center;
          -ms-flex-pack: center;
          justify-content: center;
        }

        .signature-pad-container .signature-pad-fonts {
          padding-inline: 0;
        }

        .signature-pad-container .signature-pad-fonts.active {
          max-height: 370px;
        }

        .signature-pad-container .signature-pad-font span {
          padding: 10px;
          font-size: 2rem;
        }

        .signature-pad-container .signature-pad-text {
          grid-column-start: 1;
          grid-column-end: 4;
        }
      }

      @media screen and (max-width: 575px) {

        .signature-pad-container .signature-pad-actions,
        .signature-pad-container .signature-pad-modes {
          padding-inline: 0;
        }

        .signature-pad-container .signature-pad-action {
          margin: 0;
          margin-right: 5px;
        }

        .signature-pad-container .signature-pad-fonts {
          grid-template-columns: repeat(2, 1fr);
        }

        .signature-pad-container .signature-pad-text {
          grid-column-end: 3;
        }
      }
    </style>
    <script type="text/javascript" src="https://editor.cdn.wisestamp.com/static/js/wsExternalDataDispacher/wsedd.js?ver=6.5.5" id="wsedd-js"></script>
    <main id="content" class="site-content">
      <section id="primary" class="content-area">
        <section id="main" class="site-main" role="main">
          <div class="ws-container">
            <div class="signature-pad">
              <div class="signature-pad-container">
                <div class="main-pad-wrapper">
                  <canvas class="signature-pad-canvas"></canvas>
                </div>
                <div class="signature-pad-controls">
                  <div class="signature-pad-modes">
                    <span class="icon-box icon-box-writing">
                      <span class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1 10.3719C3.97619 8.12791 9.21429 5.47589 6.35714 12.8199C3.97619 18.6952 2.98413 21.388 2.78571 22C5.7619 18.532 11.9524 11.7183 12.9048 12.2079C14.0952 12.8199 9.33333 21.388 20.6429 15.88C23.619 14.0439 24.8095 13.4319 26 14.0439" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                    </span>
                    <label class="signature-pad-switch" for="signature-mode">
                      <input type="checkbox" name="signature_mode" id="signature-mode" value="typing">
                      <span class="signature-mode-slider"></span>
                    </label>
                    <span class="icon-box icon-box-typing">
                      <span class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.75" y="7.75" width="26.5" height="12.5" rx="1.25" stroke="currentColor" stroke-width="1.5" />
                          <mask id="path-2-inside-1_208_7" fill="white">
                            <rect x="7" y="16" width="14" height="2" rx="0.5" />
                          </mask>
                          <rect x="7" y="16" width="14" height="2" rx="0.5" stroke="currentColor" stroke-width="2" mask="url(#path-2-inside-1_208_7)" />
                          <mask id="path-3-inside-2_208_7" fill="white">
                            <rect x="4" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="4" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-3-inside-2_208_7)" />
                          <mask id="path-4-inside-3_208_7" fill="white">
                            <rect x="7.00012" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="7.00012" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-4-inside-3_208_7)" />
                          <mask id="path-5-inside-4_208_7" fill="white">
                            <rect x="10" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="10" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-5-inside-4_208_7)" />
                          <mask id="path-6-inside-5_208_7" fill="white">
                            <rect x="13.0001" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="13.0001" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-6-inside-5_208_7)" />
                          <mask id="path-7-inside-6_208_7" fill="white">
                            <rect x="16" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="16" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-7-inside-6_208_7)" />
                          <mask id="path-8-inside-7_208_7" fill="white">
                            <rect x="19.0001" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="19.0001" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-8-inside-7_208_7)" />
                          <mask id="path-9-inside-8_208_7" fill="white">
                            <rect x="22" y="13" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="22" y="13" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-9-inside-8_208_7)" />
                          <mask id="path-10-inside-9_208_7" fill="white">
                            <rect x="4" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="4" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-10-inside-9_208_7)" />
                          <mask id="path-11-inside-10_208_7" fill="white">
                            <rect x="7.00012" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="7.00012" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-11-inside-10_208_7)" />
                          <mask id="path-12-inside-11_208_7" fill="white">
                            <rect x="10" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="10" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-12-inside-11_208_7)" />
                          <mask id="path-13-inside-12_208_7" fill="white">
                            <rect x="13.0001" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="13.0001" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-13-inside-12_208_7)" />
                          <mask id="path-14-inside-13_208_7" fill="white">
                            <rect x="16" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="16" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-14-inside-13_208_7)" />
                          <mask id="path-15-inside-14_208_7" fill="white">
                            <rect x="19.0001" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="19.0001" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-15-inside-14_208_7)" />
                          <mask id="path-16-inside-15_208_7" fill="white">
                            <rect x="22" y="16" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="22" y="16" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-16-inside-15_208_7)" />
                          <mask id="path-17-inside-16_208_7" fill="white">
                            <rect x="4" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="4" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-17-inside-16_208_7)" />
                          <mask id="path-18-inside-17_208_7" fill="white">
                            <rect x="7.00012" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="7.00012" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-18-inside-17_208_7)" />
                          <mask id="path-19-inside-18_208_7" fill="white">
                            <rect x="10" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="10" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-19-inside-18_208_7)" />
                          <mask id="path-20-inside-19_208_7" fill="white">
                            <rect x="13.0001" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="13.0001" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-20-inside-19_208_7)" />
                          <mask id="path-21-inside-20_208_7" fill="white">
                            <rect x="16" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="16" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-21-inside-20_208_7)" />
                          <mask id="path-22-inside-21_208_7" fill="white">
                            <rect x="19.0001" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="19.0001" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-22-inside-21_208_7)" />
                          <mask id="path-23-inside-22_208_7" fill="white">
                            <rect x="22" y="10" width="2" height="2" rx="0.25" />
                          </mask>
                          <rect x="22" y="10" width="2" height="2" rx="0.25" fill="currentColor" stroke="currentColor" stroke-width="2" mask="url(#path-23-inside-22_208_7)" />
                        </svg>
                      </span>
                    </span>
                  </div>
                  <div class="signature-pad-actions">
                    <div class="signature-pad-action signature-pad-clear">
                      <img width="23" height="25" src="https://www.wisestamp.com/wp-content/themes/wisestamp/assets/images/icons/bin-delete.svg">
                    </div>
                    <div class="signature-pad-action signature-pad-undo">
                      <img width="23" height="23" src="https://www.wisestamp.com/wp-content/themes/wisestamp/assets/images/icons/undo.svg">
                    </div>
                    <div class="signature-pad-action colors">
                      <div class="signature-pad-color" data-color="#B92424" style="color: #B92424"></div>
                      <div class="signature-pad-color" data-color="#EEBE36" style="color: #EEBE36"></div>
                      <div class="signature-pad-color" data-color="#53B700" style="color: #53B700"></div>
                      <div class="signature-pad-color" data-color="#1BA2EB" style="color: #1BA2EB"></div>
                      <div class="signature-pad-color" data-color="#DE627B" style="color: #DE627B"></div>
                      <div class="signature-pad-color" data-color="#9158BD" style="color: #9158BD"></div>
                      <div class="signature-pad-color" data-color="#333333" style="color: #333333"></div>
                    </div>
                  </div>
                  <div class="signature-pad-fonts">
                    <label for="signature-text" class="signature-pad-text">
                      <span class="label">Type your signature</span>
                      <input type="text" name="signature_text" id="signature-text" class="input-text">
                    </label>
                    <label for="signature_font_GreatVibes" class="signature-pad-font" data-font="Great Vibes">
                      <input type="radio" name="signature_font" id="signature_font_GreatVibes" class="signature-pad-font-inp" checked value="Great Vibes">
                      <span>Great Vibes</span>
                    </label>
                    <label for="signature_font_MsMadi" class="signature-pad-font" data-font="Ms Madi">
                      <input type="radio" name="signature_font" id="signature_font_MsMadi" class="signature-pad-font-inp" value="Ms Madi">
                      <span>Ms Madi</span>
                    </label>
                    <label for="signature_font_Sacramento" class="signature-pad-font" data-font="Sacramento">
                      <input type="radio" name="signature_font" id="signature_font_Sacramento" class="signature-pad-font-inp" value="Sacramento">
                      <span>Sacramento</span>
                    </label>
                    <label for="signature_font_Yellowtail" class="signature-pad-font" data-font="Yellowtail">
                      <input type="radio" name="signature_font" id="signature_font_Yellowtail" class="signature-pad-font-inp" value="Yellowtail">
                      <span>Yellowtail</span>
                    </label>
                    <label for="signature_font_Waterfall" class="signature-pad-font" data-font="Waterfall">
                      <input type="radio" name="signature_font" id="signature_font_Waterfall" class="signature-pad-font-inp" value="Waterfall">
                      <span>Waterfall</span>
                    </label>
                  </div>
                </div>
                <div class="signature-pad-export-buttons">
                  <button class="cta invert rounded download">Download Signature</button>
                </div>
              </div>
            </div>
          </div>
          <script type="text/javascript">
            document.getElementById("lang_choice_1").addEventListener("change", function(event) {
              location.href = event.currentTarget.value;
            })
          </script>
          <script type="text/javascript" src="https://www.wisestamp.com/wp-content/themes/wisestamp/js/lib/components/signature-pad/signature-pad.min.js?ver=08bdfa9499a4a6a4eb2d54e031aed8863eddcf01" id="signature_pad_script-js"></script>
  </div> <?php include('admin/ad2.php'); ?> <br>
  <!---------------------------------------------------------------->
  <!--Content Section-->
  <div class="styled-section2">
    <h2>AI-Based Online Image Tools</h2>
    <p> With the rapid advancements in artificial intelligence, managing and enhancing images has never been easier. AI-based online image tools empower users to perform complex tasks with just a few clicks. Whether you're looking to convert images into various formats, resize them to fit specific dimensions, compress large files for quicker loading times, AI tools have got you covered. </p>
    <br>
    <h3>Need a higher resolution?</h3>
    <p> AI upscaling can enhance your image's clarity without losing quality. For those working with product photos, portraits, or any visuals requiring a clean background, AI-driven background removal offers precision that was once only achievable through professional software. </p>
  </div>
  <!---------------------------------------------------------------->
  <!--FAQs Section-->
  <!----------------------------------------------------------------> <?php include('admin/social.php'); ?> <?php include('admin/calltoaction.php'); ?> <?php include('admin/footer.php'); ?> <button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
  <script async="" defer="" src=""></script>
  <script src="js/qg-main.ac82f574.js" defer=""></script>
  <script src="js/img/01.js" defer=""></script>
  <script>
    // Get the button
    var backToTopBtn = document.getElementById("backToTopBtn");
    // Show the button when scrolling down 20px from the top
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    }
    // Scroll to the top when the user clicks the button
    function scrollToTop() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    }
  </script>
  <style>
    h1 {
      color: white;
      font-size: 34px;
    }
  </style>
  </body>
</html>