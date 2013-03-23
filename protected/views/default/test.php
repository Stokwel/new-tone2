<?php
	$this->pageTitle=Yii::app()->name . ' - Test';
	$this->breadcrumbs = array(
		'Test',
	);

	Yii::app()->clientScript->registerPackage('backbone');
?>
<script>
    var Vehicle = Backbone.Model.extend({
        url: '<?= $this->createUrl('vehicle'); ?>'
    });

	var newVehicle = new Vehicle();

    newVehicle.on('change:vendor', function(model, vendor) {
		model.save();
	});
    newVehicle.on('change:modelCollection', function(model, vendor) {
        console.info('необходимо перерисовать селект моделей');
    });


	var VendorSelector = Backbone.View.extend({
        initialize: function (args) {
            _.bindAll(this, 'vendorChange');
            this.model.bind('change:vendor', this.vendorChange);
        },

        events: {
            'change': 'vendorSelected'
        },

        vendorSelected: function() {
			this.model.set('vendor', this.$el.val());
		},

        vendorChange: function() {
			this.$el.val(this.model.get('vendor'));
		}
	});

	var vendorSelect = new VendorSelector({
		model: newVehicle
	});

	var ModelSelector = Backbone.View.extend({

	});



	$(function() {

        vendorSelect.setElement($('#vendor'));

	});

</script>

<?= CHtml::dropDownList('vendor', '', SearchByVehicle::getAllVendors()); ?>