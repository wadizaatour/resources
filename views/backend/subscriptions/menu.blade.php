    <ul class="nav nav- mb-4">
      <li class="nav-item {{-- active(['backend.subscriptions.index']) --}}">
        <a class="nav-link pl-0" href="{{ route('backend.subscriptions.index', [], false) }}">Plans</a>
      </li>
      <li class="nav-item {{-- active(['backend.subscriptions.subscriptions']) --}}">
        <a class="nav-link" href="{{ route('backend.subscriptions.subscriptions', [], false) }}">Subscriptions</a>
      </li>
    </ul>
