@component('vendor.mail.html.message')
  <h3>@lang('mails.activation.subject')</h3><br/><br/>
  <span>@lang('mails.activation.salutation')</span><br/><br/>
  <span>@lang('mails.activation.content')</span><br/><br/>
  <span>@lang('mails.activation.activate')</span><br/><br/>
  @component('vendor.mail.html.button', ['color' => 'blue', 'url' => $verificationUrl])
    @lang('mails.activation.link')
  @endcomponent
  <br />
  <span>@lang('mails.activation.contact')</span>  <br>
<span style="color: lightgray"> {{$verificationUrl}} </span>
  <br><br>
  <span> @lang('mails.contact.link')</span>
  @component('vendor.mail.html.link', ['color' => 'blue', 'url' => @route('frontend.contact') ])
    @lang('mails.confirmation.form')
  @endcomponent
  <br><br>
  <span>@lang('mails.contact.salutation')</span><br/>
  <span>@lang('mails.contact.app')</span><br/><br/>
  @component('vendor.mail.html.footer')
  @endcomponent
@endcomponent
