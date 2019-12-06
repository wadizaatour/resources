{% extends "account.master" %}

{% block user_area %}

    <a href="{{ route('account.orders.index') }}" class="mb-5"><i class="mdi mdi-chevron-double-left"></i> {{ __('Back to
        orders') }}</a>

    <div class="card panel-default mt-3">
    <div class="card-header bg-white">
        <div class="row">
            <div class="col-sm-8">
                <i class="mdi mdi-account mr-2"></i> {{ __('Order #:id', {'id' : order.id}) }}
            </div>
            <div class="col-sm-4 text-right">
                {{ order.status }}
            </div>
        </div>

    </div>
    <div class="card-body">




    <div class="row">
        <div class="col-sm-12">

            <table class="table  table-sm">
                <tbody>
                <tr class="border-0">
                    <td class="text-muted border-0">{{ __('Order date') }}</td>
                    <td class="text-muted border-0">{{ order.created_at.toDayDateTimeString() }}</td>
                </tr>
                <tr>
                    <td class="text-muted  border-0">{{ __('Listing') }}</td>
                    <td class="text-muted  border-0">{{ order.listing.title }}</td>
                </tr>
                {% if order.user_choices|length %}
                    <tr>
                        <td class="text-muted  border-0">{{ __('User choices') }}</td>
                        <td class="text-muted  border-0">
                            {% for choice in order.user_choices %}
                                {{ choice.name|capitalize }}: {{ choice.value }}<br />
                            {% endfor %}
                        </td>
                    </tr>
                {% endif %}
                <tr>
                    <td class=" border-0">{{ __('Total paid') }}</td>
                    <td class=" border-0">{{ format_money(order.amount, order.currency) }}</td>
                </tr>
                <tr>
                    <td class=" border-0">{{ __('Marketplace Fee') }}</td>
                    <td class=" border-0">{{ format_money(order.service_fee, order.currency) }}</td>
                </tr>
                <tr>
                    <td class=" border-0">{{ __('Status') }}</td>
                    <td class=" border-0">{{ order.status }}</td>
                </tr>

                {% if order.status == 'declined' %}
                    <tr>
                        <td class="border-0">{{ __('Declined at') }}</td>
                        <td class="border-0">{{ order.declined_at.toFormattedDateString() }}</td>
                    </tr>
                {% endif %}

                {% if order.status == 'accepted' %}
                    <tr>
                        <td class="border-0">{{ __('Accepted at') }}</td>
                        <td class="border-0">{{ order.accepted_at.toFormattedDateString() }}</td>
                    </tr>
                {% endif %}

                </tbody>
            </table>

        </div>
    </div>
    {% if order.status == 'open' %}
        <form method="PUT" action="{{ route('account.orders.update', order) }}"
              ic-put-to="{{ route('account.orders.update', order) }}" ic-target=".main-content"
              ic-select-from-response=".main-content">
            {{ csrf_field() }}
            <div class="row mb-5">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('Message') }}</label>
                        {{ form_textarea('notes', null, {'class' : 'form-control', 'rows' : 3}) }}
                        <small class="form-text text-muted">{{ __('Send an optional message to') }} {{ order.user.display_name }}</small>
                    </div>

                </div>
                <div class="col-sm-6">
                    <button type="submit" name="status" value="decline" class="btn btn-danger btn-block">{{ __('DECLINE') }}
                    </button>
                </div>

                <div class="col-sm-6">
                    <button type="submit" name="status" value="accept" class="btn btn-primary btn-block">{{ __('APPROVE') }}
                    </button>
                </div>
            </div>
        </form>
    {% endif %}




{% endblock %}