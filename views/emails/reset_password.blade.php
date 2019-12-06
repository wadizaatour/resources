@component('mail::message')
@lang('mails.layout.hello')<br>

@lang('mails.password_reset.intro')

@component('mail::button', ['color' => 'blue', 'url' => $url])
  @lang('mails.password_reset.subject')
@endcomponent
@lang('mails.password_reset.website') <br><br>
@lang('mails.password_reset.contact')
@component('vendor.mail.html.link', ['color' => 'blue', 'url' => @route('frontend.contact') ])
contactformulier
@endcomponent
@lang('mails.password_reset.in')<br>


@lang('mails.contact.salutation')<br>
@lang('mails.layout.website')<br>

@component('vendor.mail.html.footer')
@endcomponent
@endcomponent
