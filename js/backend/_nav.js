export default (app, i18n, newPostsCount, pendingPostsCount) => {
  return [
    {
      name: i18n.t('labels.backend.titles.dashboard'),
      url: '/dashboard',
      icon: 'fe fe-trending-up',
      access: true
    },
    {
      divider: true,
      access: true
    },
    {
      name: i18n.t('labels.backend.sidebar.content'),
      url: '/content', // not used. this is a tweak to allow collapsed state
      icon: 'fe fe-folder',
      access: app.user.can('view forms') || app.user.can('view metas'), // ||
      //app.user.can('view own posts') || app.user.can('view redirects'),
      children: [
        //{
        //  name: i18n.t('labels.backend.cars.titles.main'),
        //  url: '/cars',
        //  icon: 'fe fe-navigation',
        //  access: app.user.can('view cars')
        //},
        {
          name: i18n.t('labels.backend.companies.titles.main'),
          url: '/companies',
          icon: 'fe fe-layers',
          access: app.user.can('view companies')
        },
        {
          name: i18n.t('labels.backend.categories.titles.main'),
          url: '/categories',
          icon: 'fe fe-folder',
          access: app.user.can('view categories')
        },
        {
          name: i18n.t('labels.backend.listings.titles.main'),
          url: '/listings',
          icon: 'fe fe-layers',
          access: app.user.can('view listings')
        },
        {
          name: i18n.t('labels.backend.forms.titles.main'),
          url: '/forms',
          icon: 'fe fe-edit',
          access: app.user.can('view forms')
        } //,
        //{
        //  name: i18n.t('labels.backend.posts.titles.main'),
        //  url: '/posts',
        //  icon: 'fe fe-book',
        //  access: app.user.can('view own posts')
        //},
        //{
        //  name: i18n.t('labels.backend.metas.titles.main'),
        //  url: '/metas',
        //  icon: 'fe fe-tag',
        //  access: app.user.can('view metas')
        //},
        //{
        //  name: i18n.t('labels.backend.redirects.titles.main'),
        //  url: '/redirects',
        //  icon: 'fe fe-fast-forward',
        //  access: app.user.can('view redirects')
        //}
      ]
    },
    {
      name: i18n.t('labels.backend.sidebar.site'),
      access: app.user.can('view users') || app.user.can('view roles'),
      url: '/access',
      icon: 'fe fe-settings',
      children: [
        {
          name: i18n.t('labels.backend.users.titles.main'),
          url: '/users',
          icon: 'fe fe-users',
          access: app.user.can('view users')
        } //, Roles are not in use.
        //{
        //  name: i18n.t('labels.backend.roles.titles.main'),
        //  url: '/roles',
        //  icon: 'fe fe-shield',
        //  access: app.user.can('view roles')
        //}
      ]
    }
  ]
}
