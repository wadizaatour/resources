@if ((isset($hide_owner) && $hide_owner) || !config('cms.show_post_owner'))
    @lang('labels.frontend.cms.published_at', ['date' => $post->updated_at->formatLocalized('%A %d %B %Y')])
@else
    {!!
        __('labels.frontend.cms.published_at_with_owner_linkable', [
            'date' => $post->updated_at->formatLocalized('%A %d %B %Y'),
            'name' => $post->owner,
            'link' => route('frontend.cms.owner', $post->owner->slug),
        ])
    !!}
@endif
