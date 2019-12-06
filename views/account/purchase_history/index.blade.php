{% extends "account.master" %}

{% block user_area %}

    <div class="card panel-default">
        <h6 class="card-header bg-white"><i class="mdi mdi-account mr-2"></i> {{ __('Order History') }}</h6>
        <div class="card-body">

            {% include 'notifications' %}

            <table class="table table-sm border-top-0">
                <thead class="thead-light">
                <tr>
                    <th scope="col">{{ __('Listing') }}</th>
                    <th scope="col">{{ __('Order Number') }}</th>
                    <th scope="col">{{ __('Amount') }}</th>
                    <th scope="col" class="d-none d-sm-block">{{ __('Date Ordered') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col" class="d-none d-sm-table-cell"></th>
                </tr>
                </thead>
                <tbody>
                {% for i, item in orders %}

                    <tr>
                        <td><a class="text-dark">{{ str_limit(item.listing.title, 40) }}</a><br />
                            <span class="text-muted" href="{{ route('profile', item.listing.user) }}"> </span>
                        </td>
                        <td>{{ item.hash }}</td>
                        <td>{{ format_money(item.amount, item.currency) }}</td>
                        <td class="d-none d-sm-block">{{ item.created_at.toFormattedDateString() }}</td>
                        <td>{{ _l(item.status) }}</td>
                        <td class="text-right d-none d-sm-block">
                        </td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
            {{ orders.links() |raw }}

        </div>
    </div>
{% endblock %}

