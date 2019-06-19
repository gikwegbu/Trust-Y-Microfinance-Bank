// Initialize.
function init_tree() {
  // Does element exist?
  if (!$('ul.tree').length) {
    // If not, exit.
    return;
  }
  // Expand and collapse.
  $('p.tree_controls a.expand_all, p.tree_controls a.collapse_all').click(function() {
    // Look at the class.
    if ($(this).hasClass('expand_all')) {
        $(this).parent('p').next('ul').find('a.tree_trigger')
               .addClass('trigger_expanded')
               .end().find('ul').addClass('tree_expanded');
        return false;
    } else {
        $(this).parent('p').next('ul').find('a.tree_trigger')
               .removeClass('trigger_expanded')
               .end().find('ul').removeClass('tree_expanded');
    }
    // Nofollow.
    this.blur();
    return false;
  });
  // Listen for tree clicks.
  $('ul.tree a.tree_trigger').live('click', function() {
    // Is the next <ul> hidden?
    if ($(this).next('ul').is(':hidden')) {
      $(this).addClass('trigger_expanded').next('ul')
             .addClass('tree_expanded');
    } else {
      $(this).removeClass('trigger_expanded').next('ul')
             .removeClass('tree_expanded');
    }
    // Nofollow.
    this.blur();
    return false;
     });
  // Add class for last <li>.
  $('ul.tree li:last-child').addClass('last');
  // Change state of trigger.
  $('ul.tree_expanded').prev('a').addClass('trigger_expanded');
}
// Kick things off.
$(document).ready(function() {
  init_tree();
});

    