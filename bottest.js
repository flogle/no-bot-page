async function ajax(url, data, type, dataType) {
  let result = await $.ajax(url, {
    type: type,
    data: data,
    dataType: dataType,
  })

  return result
}

$(window).on("load", () => {

    let jsonGETParms = JSON.parse($("#jsonGETParmsE").text());

    if (jsonGETParms.bot == "n") {

        setTimeout(() => {

            let url = new URL(jsonGETParms.r);

            url.searchParams.append("safe", "y");

            location.href = url.href;

        }, 2500)

    }


})

async function verify(token) {

    let recaptchaData = await ajax("verifycaptcha.php", {

        mode: "h",
        token: token

    }, "POST", "json");

    if (recaptchaData.success) {

        let url = new URL(location.href)

        url.searchParams.append("bot", "n");

        location.href = url.href;

    } else {


        let url = new URL(location.href)

        url.searchParams.append("bot", "y");

        location.href = url.href;

    }

}
