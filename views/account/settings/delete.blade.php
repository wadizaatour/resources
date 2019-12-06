<form action="{{ route('account.delete', [], false) }}" method="post" class="form-horizontal card">
  <div class="card-body font-montserrat-regular gray-text-color">
     <div class="ml-5">
     @lang('labels.user.account_delete')
      <button class="btn blue-red-bg white-cl ml-5 font-montserrat-regular"
              data-toggle="confirm"
              data-trans-button-cancel="@lang('buttons.cancel')"
              data-trans-button-confirm="@lang('buttons.delete')"
              data-trans-title="@lang('labels.are_you_sure')">@lang('labels.user.delete')
      </button>
    </div>
  </div>
@method('DELETE')
@csrf
</form>
