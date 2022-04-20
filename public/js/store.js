/* global Alpine */
document.addEventListener('alpine:init', function () {
  Alpine.store('cms', {
    editing: false,
    elements: [],
    elementCount: 0,
    toggleEditing () {
      this.editing = !this.editing

      if (this.editing === false) {
        console.log('test')
        this.elements.forEach(el => {
          el.dispatchEvent(new CustomEvent('cmssave', { bubbles: true }))
        })
      }
    },
    registerElement (element) {
      this.elements.push(element)
      this.elementCount++
    }
  })
})
