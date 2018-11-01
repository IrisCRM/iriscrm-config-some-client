/**
 * Скрипт карточки контакта
 */

irisControllers.classes.c_Contact_custom = irisControllers.classes.c_Contact.extend({
  events: {
    'field:edited #ContactDateTypeID__d_Contact_Date_Matrix': 'onChangeHandler',
  },

  onChangeHandler: function () {
    console.log('matrix field changed');
  },

  onOpen: function() {
    // Родительский обработчик
    irisControllers.classes.c_Contact_custom.__super__.onOpen.call(this);

    this.hideField('SpeakName');
  }
});
