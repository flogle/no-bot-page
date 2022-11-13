$.getScript(
  `https://www.google.com/recaptcha/api.js?render=${getreCaptchaV3SiteKey()}`,
)

async function ajax(url, data, type, dataType) {
  let result = await $.ajax(url, {
    type: type,
    data: data,
    dataType: dataType,
  })

  return result
}

let pageAction = null

$(window).on('load', () => {

    let url = new URL(location.href);

    let safe = (url.searchParams.get("safe") != null && url.searchParams.get("safe") == "y");


  grecaptcha.ready(() => {
    grecaptcha.execute(getreCaptchaV3SiteKey(), { action: pageAction }).then(async (token) => {

        let reCaptchaData = await ajax("/verifycaptcha.php", {


            mode: "v3re",
            token: token

        }, "POST", "json");

        if (reCaptchaData.score <= 0.5 && !safe) {

            let url = new URL(`${location.origin}/bottest.php`);

            url.searchParams.append("a", pageAction)
            url.searchParams.append("r", location.href)

            location.href = url.href;


        }


    })
  })
})
