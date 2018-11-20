//********************************************************************
// Раздел "Компании". Таблица.
//********************************************************************

irisControllers.classes.g_Account_custom = IrisGridController.extend({
  onOpen: function() {
    this.replaceAddButton();
    this.replaceEditButton();
  },

  replaceAddButton: function() {
    var elem = getGridFooterTable(this.el.id);
    jQuery(elem)
      .find("input.button_add")
      .attr("onclick", this.instanceName() + ".onAdd();");
  },

  replaceEditButton: function() {
    var elem = getGridFooterTable(this.el.id);
    jQuery(elem)
      .find("input.button_edit")
      .attr("onclick", this.instanceName() + ".onEdit();");

    this.$el
      .find("tr[rec_id]")
      .attr("ondblclick", this.instanceName() + ".onEdit();");
  },

  onAdd: function() {
    var html = _.template(jQuery("#grid-buttons").html(), {
      data: [
        {
          name: "Компания",
          onclick: this.onAddHandler("")
        },
        {
          name: "Моя компания",
          onclick: this.onAddHandler("Your")
        }
      ]
    });

    IrisDialog.alert(html, {
      okLabel: "Отмена",
      onOk: function() {
        IrisDialog.closeInfo();
      }
    });
  },

  onAddHandler: function(arg) {
    return (
      "IrisDialog.closeInfo(); " +
      this.instanceName() +
      ".openNewCard('" +
      arg +
      "');"
    );
  },

  openNewCard: function(type) {
    openCard({
      source_name: this.getSection(type)
    });
  },

  getSection: function(type) {
    return type === "Your" ? "Account-Your" : "Account";
  },

  onEdit: function() {
    var self = this;
    var recordId = getGridSelectedID(this.el.id);

    Transport.request({
      section: "Account",
      class: "s_Account",
      method: "getType",
      parameters: {
        id: recordId
      },
      onSuccess: function(transport) {
        var data = transport.responseText.evalJSON().data;
        openCard({
          source_name: self.getSection(data.type),
          rec_id: recordId
        });
      }
    });
  }
});
