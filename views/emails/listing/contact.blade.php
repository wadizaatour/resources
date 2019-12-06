@component('vendor.mail.html.message')
    <div style="font-family: Avenir, Helvetica, sans-serif;color:#74787E;font-size: 16px;line-height:1.5em;text-align:left;margin-top:15px">
@if(array_key_exists('is_copy', $data) && $data['is_copy'] === true)
      <h3 style="color: black">@lang('mails.contact.copy')</h3>
      <span style="color: black">@lang('mails.contact.greetings')</span><br /><br />
@else
      <span style="color: black">@lang('mails.contact.greetings') {{ $listing->user->first_name }},</span><br /><br />
@endif

      <span style="color: black">@lang('mails.contact.reaction')</span><br />
 <h4 style="color:black;font-weight: bold;">{{ $listing->category->parent->name }}</h4><h4 style="color:black;font-weight: bold;">{{ $listing->category->name }} </h4>
   <span style="color: black"> R{{ $listing->id }} - {{ $listing->title }}</span><br />

  <h3 style="color: black">@lang('mails.contact.offer')</h3>
      <div style="border:1px solid #999999;border-radius:5px;padding:12px;width:80%;margin-top:10px;background-color:lavender">
      <span style="color: black">@lang('validation.attributes.price'):</span>  <p> € {{ $data['price'] }}</p>
      <span style="color: black">
        Omschrijving:
      </span>  <p>{{ $data['message'] }}</p>
      </div>
      <div>
        <h3 style="color: black">@lang('mails.contact.contact')</h3>
        <table>
@if(array_key_exists('company_name', $data) && trim($data['company_name']) !== '')
          <tr>
            <th><span style="color: black">@lang('mails.contact.company')</span></th>
            <td>{{ $data['company_name'] }}</td>
          </tr>
@endif

          <tr>
            <th><span style="color: black">@lang('mails.contact.phone')</span></th>
            <td>{{ $data['phone'].($data['mobile'] !== '' ? ' / '.$data['mobile'] : '') }}</td>
          </tr>
            <tr>
              <th><span style="color: black">@lang('mails.contact.email')</span></th>
              <td>{{ $data['email'] }}</td>
            </tr>

          <tr>
            <th style="vertical-align:top;color: black">@lang('mails.contact.address')</th>
            <td>
              {{ $data['street'] }} {{ $data['building_nr'] }}
              {{ $data['postal'] }} {{ $data['city'] }}
            </td>
          </tr>
        </table>

        <h3 style="color: black">@lang('mails.contact.carInfo')</h3>
        <table>
          <tr><td style="vertical-align:top;color: black; font-weight: bold">@lang('labels.frontend.overview.make'):</td><td>{{ $listing->part->car->make->name }}</td></tr>
          <tr><td style="vertical-align:top;color: black; font-weight: bold">@lang('labels.frontend.overview.model'):</td><td>{{ $listing->part->car->model->name }}</td></tr>
          <tr><td style="vertical-align:top;color: black; font-weight: bold">@lang('labels.frontend.overview.type'):</td><td>{{ $listing->part->car->type->name }}</td></tr>
          <tr><td style="vertical-align:top;color: black; font-weight: bold">@lang('labels.frontend.overview.year'):</td><td>{{ $listing->part->car !== null ? $listing->part->car->year : '' }}</td></tr>
          <tr><td style="vertical-align:top;color: black; font-weight: bold">@lang('mails.contact.door'):</td><td>{{ $listing->part->car !== null ? $listing->part->car->doors : '' }}</td></tr>
          <tr><td style="vertical-align:top;color: black; font-weight: bold">@lang('labels.frontend.overview.power'):</td><td>{{ $listing->part->car !== null ? $listing->part->car->power : '' }}</td></tr>
        </table>
        <br /><br />
        <span style="color:black">@lang('mails.contact.info') </span><br /><br />
        <span style="color:black">@lang('mails.contact.link')</span>
@component('vendor.mail.html.link', ['color' => 'blue', 'url' => @route('frontend.contact') ])
        contactformulier
@endcomponent
        <br /><br />
        <span style="color:black">@lang('mails.contact.salutation')</span><br />
        <span style="color:black">@lang('mails.contact.app')</span><br /><br />
      </div>
    </div>
@component('vendor.mail.html.footer')
@endcomponent
@endcomponent
