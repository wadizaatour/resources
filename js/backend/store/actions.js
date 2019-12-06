import axios from 'axios'

export function createActions(route, app) {
  if (app.cmsEnabled) {
    return {
      LOAD_COUNTERS: ({ commit }) => {
        return new Promise(resolve => {
          axios
            .all([
              axios.get(route('backend.posts.draft.counter')),
              axios.get(route('backend.posts.pending.counter')),
              axios.get(route('backend.posts.published.counter')),
              axios.get(route('backend.users.active.counter')),
              axios.get(route('backend.form_submissions.counter'))
            ])
            .then(
              axios.spread(
                (
                  newPostsCount,
                  pendingPostsCount,
                  publishedPostsCount,
                  activeUsersCount,
                  formSubmissionsCount
                ) => {
                  commit('SET_COUNTER', {
                    type: 'newPostsCount',
                    counter: newPostsCount.data
                  })
                  commit('SET_COUNTER', {
                    type: 'pendingPostsCount',
                    counter: pendingPostsCount.data
                  })
                  commit('SET_COUNTER', {
                    type: 'publishedPostsCount',
                    counter: publishedPostsCount.data
                  })
                  commit('SET_COUNTER', {
                    type: 'activeUsersCount',
                    counter: activeUsersCount.data
                  })
                  commit('SET_COUNTER', {
                    type: 'formSubmissionsCount',
                    counter: formSubmissionsCount.data
                  })

                  resolve()
                }
              )
            )
        })
      }
    }
  } else {
    return {
      LOAD_COUNTERS: ({ commit }) => {
        return new Promise(resolve => {
          axios
            .all([
              axios.get(route('backend.users.active.counter')),
              axios.get(route('backend.form_submissions.counter'))
            ])
            .then(
              axios.spread((activeUsersCount, formSubmissionsCount) => {
                commit('SET_COUNTER', {
                  type: 'activeUsersCount',
                  counter: activeUsersCount.data
                })
                commit('SET_COUNTER', {
                  type: 'formSubmissionsCount',
                  counter: formSubmissionsCount.data
                })

                resolve()
              })
            )
        })
      }
    }
  }
}
