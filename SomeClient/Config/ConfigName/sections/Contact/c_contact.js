/**
 * Скрипт карточки контакта
 */

irisControllers.classes.c_Contact_custom = irisControllers.classes.c_Contact.extend({
  onOpen: function() {
    // Родительский обработчик
    irisControllers.classes.c_Contact_custom.__super__.onOpen.call(this);

    this.hideField('SpeakName');
  }
});
