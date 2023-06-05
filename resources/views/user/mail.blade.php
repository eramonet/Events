<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="  images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="  images/favicon.png" type="image/x-icon" />
    <title>E-Ramo Store | Email Verfification</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet" />
  </head>

  <body
    style='text-align: center;
  margin: 20px auto;
  width: 650px;
  font-family: "Nunito Sans", sans-serif;
  background-color: #e2e2e2;
  display: block;
  position: relative;'>
    <table cellpadding="0" cellspacing="0"
        style="background-color: #fff; width: 100%; border-collapse: collapse;
    border-spacing: 0;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr class="header">
                            <td align="left" valign="top"
                                style="padding: 16px calc(12px + (26 - 12) * ((100vw - 320px) / (1920 - 320)));">
                                <img src="{{ $banner }}" class="main-logo" style=" width: 110px; height: auto; " />
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td class="banner" style="position: relative;">
                    <table>
                        <tr>
                            <td colspan="2"><img style="width: 100%; margin-bottom: -6px;" src="https://spinnakernordic.com/wp-content/uploads/2016/07/google-ad-sizes-960x250-1.jpg"
                                    alt="banner" /></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td class="section-t"
                    style="position: relative; padding: 0 calc(15px + (88 - 15) * ((100vw - 320px) / (1920 - 320))); margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
                    display: block;">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <h1 class="heading-1"
                                    style="margin-bottom: 6px;font-weight: bold;
                                font-size: 16px;
                                line-height: calc(17px + (20 - 17) * ((100vw - 320px) / (1920 - 320)));
                                color: #252525;">
                                    Hi {{ $name }} , Welcome To E-Ramo
                                    Store.!</h1>
                                <p class="pera"
                                    style="font-weight: 600;font-size: 14px;line-height: calc(21px + (23 - 21) * ((100vw - 320px) / (1920 - 320)));text-align: center;
                                    color: #939393;
                                    margin-bottom: -4px;">
                                    {{$text_verification}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td class="section-t"
                    style="margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
                display: block;">
                    {{-- <a href="javascript:void(0)" class="button-solid">Verify Email</a> --}}
                    <a style="text-decoration: none;" href="{{ $link }}" target="_blank">Verify Email</a>
                </td>
            </tr>

            <tr>
                <td class="section-t"
                    style="padding: 0 calc(15px + (46 - 15) * ((100vw - 320px) / (1920 - 320)));margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
                display: block;">
                    <p class="pera"
                        style="font-weight: 600;
                    font-size: 14px;
                    line-height: calc(21px + (23 - 21) * ((100vw - 320px) / (1920 - 320)));
                    text-align: center;
                    color: #939393;
                    margin-bottom: -4px;">
                        this is verification
                    </p>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="section-t"
                    style="background-color: #212121; padding: calc(20px + (26 - 20) * ((100vw - 320px) / (1920 - 320))) 0; margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
                    display: block;">
                    <table class="footer" style="position: relative;
                    width: 100%;">
                        <tr>
                            <td class="footer-content">
                                <table cellpadding="0" cellspacing="0" class="footer-social-icon"
                                    class="text-center"
                                    style="vertical-align: middle; margin: 0 auto; width: 326px">

                                    <tr>
                                        <td>
                                            <p
                                                style="
                                                font-weight: 800;
            font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));
            line-height: 23px;
            text-align: center;
            letter-spacing: 0.5px;
            color: #e4e4e4;
            margin-top: 15px;
            text-transform: uppercase;
            ">
                                                THIS EMAIL WAS CREATED USING THE multikart. MADE WITH BY DESIGN
                                                multikart
                                                TEAM.</p>
                                            <a style="text-decoration: none;font-weight: 800;
                                            font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));
                                            line-height: 23px;
                                            text-align: center;
                                            letter-spacing: 0.5px;
                                            text-decoration-line: underline;
            text-transform: uppercase;
            color: #ff4c3b;
            display: inline-block;
            margin-top: calc(15px + (21 - 15) * ((100vw - 320px) / (1920 - 320)));"
                                                class="unsubscribe" href="javascript:void(0)"> UNSUBSCRIBE </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
