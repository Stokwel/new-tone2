<?php
	$this->pageTitle=Yii::app()->name . ' - Поиск машины';
	$this->breadcrumbs = array('Поиск машины');
?>
<script>
    $(function() {

        function fillCars(cars)
        {
            $('#year').html('');
            $('#mod').html('');

            var html = '';
            $('#car').html(html);
            for (var i in cars) {
                html += '<option value="'+cars[i]+'">'+cars[i]+'</option>';
            }
            $('#car').html(html);
        }

        function fillYears(years)
        {
            $('#mod').html('');

            var html = '';
            $('#year').html(html);
            for (var i in years) {
                html += '<option value="'+years[i]+'">'+years[i]+'</option>';
            }
            $('#year').html(html);
        }

        function fillMod(mods)
        {
            var html = '';
            $('#mod').html(html);
            for (var i in mods) {
                html += '<option value="'+mods[i]+'">'+mods[i]+'</option>';
            }
            $('#mod').html(html);
        }

        $('#vendor').on('change', function() {
            var owner = this;
            $.ajax({
                url: '<?= $this->createUrl('getCars'); ?>',
                data: 'vendor='+$(owner).val(),
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    fillCars(data);
                },
                error: function() {
                    alert('Уупс! Что то пошло не так =(');
                }
            })
        });

        $('#car').on('change', function() {
            var owner = this;
            $.ajax({
                url: '<?= $this->createUrl('getYears'); ?>',
                data: 'vendor='+$('#vendor').val()+'&car='+$(owner).val(),
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    console.info(data);
                    fillYears(data);
                },
                error: function() {
                    alert('Уупс! Что то пошло не так =(');
                }
            })
        });

        $('#year').on('change', function() {
            var owner = this;
            $.ajax({
                url: '<?= $this->createUrl('getMods'); ?>',
                data: 'vendor='+$('#vendor').val()+'&car='+$('#car').val()+'&year='+$(owner).val(),
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    console.info(data);
                    fillMod(data);
                },
                error: function() {
                    alert('Уупс! Что то пошло не так =(');
                }
            })
        });

        $('#mod').on('change', function() {
            var owner = this;
            $.ajax({
                url: '<?= $this->createUrl('getData'); ?>',
                data: 'vendor='+$('#vendor').val()+'&car='+$('#car').val()
                        +'&year='+$('#year').val()+'&mod='+$(owner).val(),
                type: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.searchResult').html(data);
                },
                error: function() {
                    alert('Уупс! Что то пошло не так =(');
                }
            })
        });
    });
</script>

<!-- Производители -->
<?= CHtml::dropDownList('vendor', '', SearchByVehicle::getAllVendors()); ?>
<!-- Модель машины -->
<?= CHtml::dropDownList('car', '', array()); ?>
<!-- Год выпуска -->
<?= CHtml::dropDownList('year', '', array()); ?>
<!-- Модификации -->
<?= CHtml::dropDownList('mod', '', array()); ?>

<div class="searchResult">
</div>