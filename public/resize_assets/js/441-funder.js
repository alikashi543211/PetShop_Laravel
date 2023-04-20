(function () {
  let timeout;

  function init(attempts) {
    clearTimeout(timeout)
    attempts = attempts || 1
    if (attempts > 3) return
    if (typeof CodeFundAd === 'undefined') {
      timeout = setTimeout(function () { init(attempts + 1) }, 350)
      return
    }
    new CodeFundAd({"selector":"#codefund_ad","template":"bottom-bar","theme":"light","fallback":false,"urls":{"impression":"https://codefund.io/display/d4fe5fce-caf3-4b62-b95a-05715b0219c0.gif","campaign":"https://codefund.io/impressions/d4fe5fce-caf3-4b62-b95a-05715b0219c0/click?campaign_id=994\u0026creative_id=923\u0026property_id=441\u0026template=bottom-bar\u0026theme=light","poweredBy":"https://codefund.io/invite/uaY8mStZDXQ","adblock":"https://cdn2.codefund.app/assets/px.js","uplift":"https://codefund.io/impressions/d4fe5fce-caf3-4b62-b95a-05715b0219c0/uplift?advertiser_id=515"},"creative":{"name":"cult_curated","headline":".cult by Honeypot","body":"🔮 untold developer stories, documentaries, events and podcasts.","cta":"Check it out!","imageUrls":{"icon":"https://cdn2.codefund.io/etihkonadvezfjqix2povm7fd984","small":"https://cdn2.codefund.io/zdja12i94zg5u0y3eyjxa7z0al6o","large":"https://cdn2.codefund.io/abit7w7shxbrwnurfdh74l3f89ns","wide":"https://cdn2.codefund.io/g2iql5tvp95q449r9kk1nro0weog"}}})
  }

  const codefundThemeName = 'light'
  const codefundStylesheetId = 'codefund-style'
  const codefundScriptId = 'codefund-script'

  if (!document.getElementById(codefundStylesheetId) && codefundThemeName !== 'unstyled') {
    const stylesheet = document.createElement('link')
    stylesheet.setAttribute('id', codefundStylesheetId)
    stylesheet.setAttribute('rel', 'stylesheet')
    stylesheet.setAttribute('media', 'all')
    stylesheet.setAttribute('href', 'https://codefund.io/packs/css/code_fund_ad-38735fb1.css')
    stylesheet.addEventListener('load', init)
    document.head.appendChild(stylesheet)
  }

  if (document.getElementById(codefundScriptId)) {
    init()
  } else {
    const script = document.createElement('script')
    script.setAttribute('id', codefundScriptId)
    script.setAttribute('type', 'text/javascript')
    script.setAttribute('src', 'https://codefund.io/packs/js/code_fund_ad-c5122a9eb2cf2a34fc49.js')
    script.addEventListener('load', init)
    document.head.appendChild(script)
  }
})()
