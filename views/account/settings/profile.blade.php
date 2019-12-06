
  <table class="table table-striped table-hover">
    <tr><th class="font-montserrat font-unset">@lang('validation.attributes.name')</th><td class="font-montserrat-regular gray-text-color">{{ $loggedInUser->first_name }} {{ $loggedInUser->last_name }}</td></tr>
    <tr><th class="font-montserrat font-unset">@lang('validation.attributes.email')</th><td class="font-montserrat-regular gray-text-color">{{ $loggedInUser->email }}</td></tr>
    <tr><th class="font-montserrat font-unset">@lang('validation.attributes.locale')</th><td class="font-montserrat-regular gray-text-color">{{ $loggedInUser->locale }}</td></tr>
    <tr><th class="font-montserrat font-unset">@lang('validation.attributes.timezone')</th><td class="font-montserrat-regular gray-text-color">{{ $loggedInUser->timezone }}</td></tr>
    <tr><th class="font-montserrat font-unset">@lang('labels.created_at')</th><td class="font-montserrat-regular gray-text-color">{{ $loggedInUser->created_at->setTimezone($loggedInUser->timezone) }} ({{ $loggedInUser->created_at->diffForHumans() }})</td></tr>
    <tr><th class="font-montserrat font-unset">@lang('labels.updated_at')</th><td class="font-montserrat-regular gray-text-color">{{ $loggedInUser->updated_at->setTimezone($loggedInUser->timezone) }} ({{ $loggedInUser->updated_at->diffForHumans() }})</td></tr>
  </table>


