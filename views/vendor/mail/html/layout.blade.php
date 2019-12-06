<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>
    <style>
      @media only screen and (max-width: 600px) {
        .inner-body {
          width: 100% !important;
        }
        .footer {
          width: 100% !important;
        }
      }
      @media only screen and (max-width: 500px) {
        .button {
          width: 100% !important;
        }
      }
    </style>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">
          <table class="content" width="100%" cellpadding="0" cellspacing="0">
             <img style="margin-left: -30px; margin-right: auto; margin-top: 13px; margin-bottom: 10px;width: 27%;" src="{{ asset('images/header/carparts-logo.png') }}" alt="Logo" class="logoImg" />
            <tr>
              <td class="body" width="100%" cellpadding="0" cellspacing="0">
                <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="content-cell">
                      {{ Illuminate\Mail\Markdown::parse($slot) }}
@if(isset($subcopy))
                      {{ $subcopy or '' }}
@endif
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
