<template>
  <div class="row">
    <div class="col col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="card-text">
            <b-button
              squared
              size="sm"
              variant="outline-primary"
              v-b-tooltip.hover
              :title="$t('buttons.create')"
              @click="addNode"
            >
              <i class="fe fe-folder-plus"></i> Add main category
            </b-button>
            <vue-tree-list
              @click="onClick"
              @change-name="onChangeName"
              @delete-node="onDel"
              @add-node="onAddNode"
              :model="data"
              default-tree-node-name="New category"
              :default-expanded="false"
              ref="treeList"
            >
              <span class="icon" slot="editNode">
                <b-button
                  size="sm"
                  variant="outline-primary"
                  v-b-tooltip.hover
                  :title="$t('buttons.edit')"
                >
                  <i class="fe fe-edit"></i>
                </b-button>
              </span>
              <span class="icon" slot="addTreeNode">
                <b-button
                  size="sm"
                  variant="outline-primary"
                  v-b-tooltip.hover
                  :title="$t('buttons.create')"
                >
                  <i class="fe fe-folder-plus"></i>
                </b-button>
              </span>
              <span class="icon" slot="delNode">
                <b-button
                  size="sm"
                  variant="outline-danger"
                  v-b-tooltip.hover
                  :title="$t('buttons.delete')"
                >
                  <i class="fe fe-trash"></i>
                </b-button>
              </span>
            </vue-tree-list>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Category details</h5>
          <div class="card-text">
            <div v-if="Object.values(category).length" class="row">
              <div class="col col-sm-12">
                Name: <strong>{{ category.name }}</strong>
              </div>
              <div class="col col-sm-12">
                Additional part attributes:
                <form>
                  <div
                    v-for="(field, index) in category.part_attributes"
                    :key="field.id"
                    class="row"
                  >
                    <div class="col col-sm-11">
                      <input
                        type="text"
                        :name="'part_attributes[' + index + ']'"
                        class="form-control"
                        required="required"
                        v-model="category.part_attributes[index]"
                      />
                    </div>
                    <div class="col col-sm-1">
                      <b-button
                        @click="rmAttribute(index)"
                        size="sm"
                        variant="outline-danger"
                        v-b-tooltip.hover
                        :title="$t('buttons.delete')"
                      >
                        <i class="fe fe-trash"></i>
                      </b-button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-sm-11"></div>
                    <div class="col col-sm-1">
                      <b-button
                        @click="addAttribute"
                        size="sm"
                        variant="outline-primary"
                        v-b-tooltip.hover
                        :title="$t('buttons.create')"
                      >
                        <i class="fe fe-plus-square"></i>
                      </b-button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div v-else class="col col-12">
              Select a category.
            </div>
            <div v-if="Object.values(category).length" class="row">
              <div class="col col-12 text-right">
                <br />
                <b-button
                  @click="updateNode"
                  size="sm"
                  variant="outline-primary"
                  v-b-tooltip.hover
                  :title="$t('buttons.save')"
                >
                  <i class="fe fe-save"></i>
                </b-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { VueTreeList, Tree, TreeNode } from 'vue-tree-list'

export default {
  name: 'Categories',
  components: {
    VueTreeList
  },
  data() {
    return {
      data: {},
      category: {}
    }
  },
  mounted() {
    axios.get('/api/categories').then(res => {
      let cats_l1 = [],
        keys = Object.keys(res.data),
        values = Object.values(res.data)
      for (let i = 0; i < keys.length; i++) {
        cats_l1.push({
          id: keys[i],
          pid: 0,
          name: values[i],
          addTreeNodeDisabled: false,
          addLeafNodeDisabled: true,
          editNodeDisabled: false,
          delNodeDisabled: false,
          children: []
        })
      }
      this.data = new Tree(cats_l1)
    })
  },
  methods: {
    addAttribute() {
      this.category.part_attributes.push('')
    },
    addNode() {
      // Add main category.
      let node = new TreeNode({
        name: 'New category',
        isLeaf: false,
        addLeafNodeDisabled: true
      })
      if (!this.data.children) this.data.children = []
      this.data.addChildren(node)
      this.store(node)
    },
    expander(node) {
      if (node.children !== null && node.children.length) {
        // Collapse all expanded main categories and
        // expand clicked main category.
        this.$refs.treeList.$children.forEach(obj => {
          if (obj.expanded === true && obj.model.id !== node.id) {
            obj.toggle()
          }
          if (obj.expanded !== true && obj.model.id === node.id) {
            obj.toggle()
          }
        })
      }
    },
    onAddNode(node) {
      // triggered on add subcategory.
      node.addLeafNodeDisabled = true
      this.store(node)
      this.category = node
    },
    onChangeName(params) {
      if (params.newName !== params.oldName) {
        axios
          .put(
            this.$app.route('backend.categories.update', {
              category: params.id
            }),
            { name: params.newName }
          )
          .then(res => {
            if (this.category.id === params.id) {
              this.category.name = params.newName
            }
          })
      }
    },
    onClick(node) {
      axios
        .get(
          this.$app.route('backend.categories.edit', {
            category: node.id
          })
        )
        .then(res => {
          this.category = res.data
        })

      if (
        node.pid === 0 &&
        (node.children === null || node.children.length === 0)
      ) {
        axios.get('/api/categories/' + node.id).then(res => {
          let keys = Object.keys(res.data),
            values = Object.values(res.data)
          for (let i = 0; i < keys.length; i++) {
            node.addChildren(
              new TreeNode({
                id: keys[i],
                name: values[i],
                pid: node.id,
                addTreeNodeDisabled: true,
                addLeafNodeDisabled: true,
                editNodeDisabled: false,
                delNodeDisabled: false
              })
            )
          }
          this.expander(node)
        })
      } else {
        this.expander(node)
      }
      this.category = node
    },
    onContextChanged() {
      this.$emit('context-changed')
    },
    async onDel(node) {
      let result = await window.swal({
        title: this.$t('labels.are_you_sure'),
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: this.$t('buttons.cancel'),
        confirmButtonColor: '#dd4b39',
        confirmButtonText: this.$t('buttons.delete')
      })

      if (result.value) {
        try {
          let { data } = await axios.delete(
            this.$app.route('backend.categories.destroy', node.id)
          )
          node.remove()
          this.onContextChanged()
          this.category = null
          this.$app.noty[data.status](data.message)
        } catch (e) {
          this.$app.error(e)
        }
      }
    },
    rmAttribute(index) {
      this.$delete(this.category.part_attributes, index)
    },
    store(node) {
      axios
        .post(this.$app.route('backend.categories.store'), {
          name: node.name,
          parent_id: node.pid,
          order: node.order,
          part_attributes: []
        })
        .then(res => {
          if (res.data.id > 0) {
            node.id = res.data.id
            this.category = node
            this.$app.noty['success']('Category created.')
          } else {
            node.remove()
            this.$app.noty['error'](
              'Something went wrong. Please reload the page manually.'
            )
          }
        })
    },
    updateNode() {
      axios
        .put(
          this.$app.route('backend.categories.update', {
            category: this.category.id
          }),
          {
            name: this.category.name,
            parent_id: this.category.parent_id,
            order: this.category.order,
            part_attributes: this.category.part_attributes
          }
        )
        .then(res => {
          this.$app.noty[res.data.status](res.data.message)
        })
    }
  }
}
</script>

<style lang="css">
.vtl-tree-node {
  height: 30px;
}
</style>
<style lang="css" rel="stylesheet/css" scoped>
.icon:hover {
  cursor: pointer;
}
</style>
