/* global Alpine */
document.addEventListener('alpine:init', function () {
  Alpine.store('cms', {
    editing: false,
    toggle () {
      this.editing = !this.editing
    }
  })
})
