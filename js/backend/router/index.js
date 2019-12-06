import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

// Views
import Dashboard from '../views/Dashboard'
import Car from '../views/Car'
import Cars from '../views/Cars'
import Categories from '../views/Categories'
import Company from '../views/Company'
import Companies from '../views/Companies'
import Form from '../views/Form'
import Forms from '../views/Forms'
import FormSubmission from '../views/FormSubmission'
import FormSubmissions from '../views/FormSubmissions'
import Listing from '../views/Listing'
import Listings from '../views/Listings'
//import Meta from '../views/Meta'
//import Metas from '../views/Metas'
//import Post from '../views/Post'
//import Posts from '../views/PostList'
//import Redirect from '../views/Redirect'
//import Redirects from '../views/Redirects'
import Role from '../views/Role'
import Roles from '../views/Roles'
//import Search from '../views/Search'
import User from '../views/User'
import Users from '../views/Users'

Vue.use(Router)

export function createRouter(base, i18n) {
  return new Router({
    mode: 'history',
    base: base,
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: [
      {
        path: '/',
        redirect: '/dashboard',
        name: 'index',
        component: Full,
        meta: {
          label: i18n.t('labels.frontend.titles.backend')
        },
        children: [
          {
            path: 'dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
              label: i18n.t('labels.backend.titles.dashboard')
            }
          },
          {
            path: 'cars',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: 'Cars' //i18n.t('labels.backend.metas.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'cars',
                component: Cars,
                meta: {
                  label: 'Cars' //i18n.t('labels.backend.titles.cars')
                }
              },
              {
                path: 'create',
                name: 'car_create',
                component: Car,
                meta: {
                  label: 'Create car' //i18n.t('labels.backend.companies.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'car_edit',
                component: Car,
                props: true,
                meta: {
                  label: 'Edit car' //i18n.t('labels.backend.companies.titles.edit')
                }
              }
            ]
          },
          {
            path: 'categories',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.categories.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'categories',
                component: Categories,
                meta: {
                  label: i18n.t('labels.backend.categories.titles.index')
                }
              }
            ]
          },
          {
            path: 'companies',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.companies.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'companies',
                component: Companies,
                meta: {
                  label: i18n.t('labels.backend.companies.titles.index')
                }
              },
              {
                path: 'create',
                name: 'companies_create',
                component: Company,
                meta: {
                  label: i18n.t('labels.backend.companies.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'companies_edit',
                component: Company,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.companies.titles.edit')
                }
              }
            ]
          },
          {
            path: 'form-submissions',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.form_submissions.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'form_submissions',
                component: FormSubmissions,
                meta: {
                  label: i18n.t('labels.backend.form_submissions.titles.index')
                }
              },
              {
                path: ':id/show',
                name: 'form_submissions_show',
                component: FormSubmission,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.form_submissions.titles.show')
                }
              }
            ]
          },
          {
            path: 'forms',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.forms.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'forms',
                component: Forms,
                meta: {
                  label: i18n.t('labels.backend.forms.titles.index')
                }
              },
              {
                path: 'create',
                name: 'forms_create',
                component: Form,
                meta: {
                  label: i18n.t('labels.backend.forms.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'forms_edit',
                component: Form,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.forms.titles.edit')
                }
              }
            ]
          },
          {
            path: 'listings',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.listings.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'listings',
                component: Listings,
                meta: {
                  label: i18n.t('labels.backend.listings.titles.main')
                }
              },
              {
                path: 'create',
                name: 'listing_create',
                component: Listing,
                meta: {
                  label: i18n.t('labels.backend.listings.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'listing_edit',
                component: Listing,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.listings.titles.edit')
                }
              }
            ]
          },
          //{
          //  path: 'metas',
          //  component: {
          //    render(c) {
          //      return c('router-view')
          //    }
          //  },
          //  meta: {
          //    label: i18n.t('labels.backend.metas.titles.main')
          //  },
          //  children: [
          //    {
          //      path: '/',
          //      name: 'metas',
          //      component: Metas,
          //      meta: {
          //         label: i18n.t('labels.backend.metas.titles.index')
          //       }
          //     },
          //     {
          //       path: 'create',
          //       name: 'metas_create',
          //       component: Meta,
          //       meta: {
          //         label: i18n.t('labels.backend.metas.titles.create')
          //       }
          //     },
          //     {
          //       path: ':id/edit',
          //       name: 'metas_edit',
          //       component: Meta,
          //       props: true,
          //       meta: {
          //         label: i18n.t('labels.backend.metas.titles.edit')
          //       }
          //     }
          //   ]
          // },
          //{
          //  path: 'posts',
          //  component: {
          //    render(c) {
          //      return c('router-view')
          //    }
          //  },
          //  meta: {
          //    label: i18n.t('labels.backend.posts.titles.main')
          //  },
          //  children: [
          //    {
          //      path: '/',
          //      name: 'posts',
          //      component: Posts,
          //      meta: {
          //        label: i18n.t('labels.backend.posts.titles.index')
          //      }
          //    },
          //    {
          //      path: 'create',
          //      name: 'posts_create',
          //      component: Post,
          //      meta: {
          //        label: i18n.t('labels.backend.posts.titles.create')
          //      }
          //    },
          //    {
          //      path: ':id/edit',
          //      name: 'posts_edit',
          //      component: Post,
          //      props: true,
          //      meta: {
          //        label: i18n.t('labels.backend.posts.titles.edit')
          //      }
          //    }
          //  ]
          //},
          //,
          //{
          //  path: 'redirects',
          //  component: {
          //    render(c) {
          //      return c('router-view')
          //    }
          //  },
          //  meta: {
          //    label: i18n.t('labels.backend.redirects.titles.main')
          //  },
          //  children: [
          //    {
          //      path: '/',
          //      name: 'redirects',
          //      component: Redirects,
          //      meta: {
          //        label: i18n.t('labels.backend.redirects.titles.index')
          //      }
          //    },
          //    {
          //      path: 'create',
          //      name: 'redirects_create',
          //      component: Redirect,
          //      meta: {
          //        label: i18n.t('labels.backend.redirects.titles.create')
          //      }
          //    },
          //    {
          //      path: ':id/edit',
          //      name: 'redirects_edit',
          //      component: Redirect,
          //      props: true,
          //      meta: {
          //        label: i18n.t('labels.backend.redirects.titles.edit')
          //      }
          //    }
          //  ]
          //},
          {
            path: 'roles',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.roles.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'roles',
                component: Roles,
                meta: {
                  label: i18n.t('labels.backend.roles.titles.index')
                }
              },
              {
                path: 'create',
                name: 'roles_create',
                component: Role,
                meta: {
                  label: i18n.t('labels.backend.roles.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'roles_edit',
                component: Role,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.roles.titles.edit')
                }
              }
            ]
          },
          {
            path: 'users',
            component: {
              render(c) {
                return c('router-view')
              }
            },
            meta: {
              label: i18n.t('labels.backend.users.titles.main')
            },
            children: [
              {
                path: '/',
                name: 'users',
                component: Users,
                meta: {
                  label: i18n.t('labels.backend.users.titles.index')
                }
              },
              {
                path: 'create',
                name: 'users_create',
                component: User,
                meta: {
                  label: i18n.t('labels.backend.users.titles.create')
                }
              },
              {
                path: ':id/edit',
                name: 'users_edit',
                component: User,
                props: true,
                meta: {
                  label: i18n.t('labels.backend.users.titles.edit')
                }
              }
            ]
          }
        ]
      }
    ]
  })
}
