@component('vendor.mail.html.message')
  <div style="font-family:Avenir, Helvetica, sans-serif;color:#74787E;font-size:16px;line-height:1.5em;text-align:left;margin-top:15px">
    <span style="color:black">@lang('mails.contact.greetings') {{ $contact['first_name'] }}</span><br /><br />
    <span style="color:black">@lang('mails.confirmation.request')</span><br /><br />
    <strong>@lang('mails.confirmation.data')</strong><br />
    <table style="border:1px solid #999999;border-radius:5px;padding:12px;margin-top:15px;width:91%;background-color:lavender">
@if(trim($car->lpn) !== '')
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.lp')</th>
        <td>{{ $car->lpn }}</td>
      </tr>
@endif
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.model')</th>
        <td>{{ $car->make->name }} {{ $car->model->name }}</td>
      </tr>
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.type')</th>
        <td>{{ $car->type->name }}</td>
      </tr>
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.year')</th>
        <td>{{ $car->year }}</td>
      </tr>
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.cylinder')</th>
        <td>{{ $car->type->engine_contents }}</td>
      </tr>
    </table>
    <br />
    <strong>@lang('mails.confirmation.parts')</strong><br />
    <table style="border:1px solid #999999;margin-top:15px;border-radius:5px;padding:12px;width:91%;background-color:lavender">
      <thead>
        <tr style="text-align:left;color:black">
          <th>@lang('mails.contact.requestid')</th>
          <th>@lang('mails.confirmation.category')</th>
          <th>@lang('mails.confirmation.description')</th>
          <th>@lang('mails.confirmation.code')</th>
        </tr>
      </thead>
      <tbody>
@foreach($listings as $listing)
        <tr>
          <td>R{{ $listing->id }}</td>
          <td>{{ $listing->category->parent->name }}: {{ $listing->category->name }}</td>
          <td>{{ $listing->description }}</td>
          <td><a href="{{ route('frontend.listing.signoff', [$listing, $listing->slug]) }}"
                 title="Afmelden">{{ Hashids::encode($listing->part->id) }}</a></td>
        </tr>
@endforeach
      </tbody>
    </table>
    <br />
    <strong style="margin-bottom:5px">@lang('mails.confirmation.contact')</strong><br />
    <table style="border:1px solid #999999;border-radius:5px;padding:12px;margin-top:15px;background-color:lavender;width:91%">
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.name')</th>
        <td>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
      </tr>
      <tr>
        <th style="text-align:left;color:black">@lang('mails.contact.email')</th>
        <td>{{ $contact['email'] }}</td>
      </tr>
      <tr>
        <th style="text-align:left;color:black">@lang('mails.contact.phone')</th>
        <td>{{ $contact['phone'] }}{{ trim($contact['mobile']) !== '' ? ' / '.$contact['mobile'] : '' }}</td>
      </tr>
      <tr>
        <th style="text-align:left;color:black">@lang('mails.confirmation.place')</th>
        <td>{{ $contact['city'] }}</td>
      </tr>
    </table>
    <br /><br />
    <span style="color:black">@lang('mails.password_reset.contact')</span>
    <a href="{{ route('frontend.contact') }}" title="Contactformulier">@lang('mails.confirmation.form')</a>
    <span style="color:black">in.</span><br /><br />
    <span style="color:black">@lang('mails.contact.salutation')</span><br />
    <span style="color:black">@lang('mails.contact.app')</span><br /><br />
    @component('vendor.mail.html.footer')
    @endcomponent
  </div>
@endcomponent
