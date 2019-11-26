$(document).ready(function(){

    var sumBalancetotal = 0;
    var combobox = $('select[name=type]');
    var combobox_hoja = $('select[name=type_printer]');
    var input_txt_monto_pago = $('input[name="txt_monto_pago"]');
    var not_many_clicks_button = 0;

    input_txt_monto_pago.prop('disabled', false);
    input_txt_monto_pago.val('');
    input_txt_monto_pago.focus();

    combobox.val('0');

    if ($.cookie('hoja')) {
        combobox_hoja.val($.cookie('hoja'));
    }
    /*input_txt_monto_pago.keydown(function(event) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ( $.inArray(event.keyCode,[46,8,9,27,13,190]) !== -1 ||
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });*/


   $("#lista").jqGrid({
        mtype: 'POST',
        datatype: 'json',
        postData:{ 
        	type: 10,
            parameter:contract,
            add: 0
        },
        loadComplete: function(data) {
            if($('select[name=type]').val() == 2){
                $("#generated_sumbalance").html("<p class='balance' > Total a pagar: <span> RD$ 200.00</span></p>");
                sumBalancetotal = 200;
            } else {
                $("#generated_sumbalance").html("<p class='balance' > Total a pagar: <span> RD$ " + data.sumBalance + "</span></p>");
                sumBalancetotal = data.sumBalance;  
            }
        },
        url: link_to('credit_info'),
        colNames: ['Concepto', 'Monto', 'Pagado', 'Fecha','Balance'],
        colModel: [
        { name: 'Concepto', index: 'Concepto', width: 250, sortable: false, search:false},
        { name: 'Monto', index: 'Monto', width: 200, sortable: false, search:false, align:'right'},
        { name: 'Pagado', index: 'Pagado', width: 150, sortable: false, search:false, align:'right' },
        { name: 'Fecha', index: 'Fecha', width: 200, sortable: false, search:false, align:'center' },
        { name: 'Balance', index: 'Balance', width: 170, sortable: false, search:false, align:'right'}
        ],
        pager: '#paginador', 
        sortname: 'Contrato', 
        viewrecords: true, 
        sortorder: "desc", 
        caption:"Detalle Clientes" 
    });


	/*function set_total_balance (cellvalue, options, rowObject)
	{
	   total_balance += parseFloat(cellvalue);
	   return cellvalue;
	}*/

    $("#lista").jqGrid('navGrid','#paginador',{edit:false,add:false,del:false});
    //$('#lista').setGridHeight(250);
    //$('#lista').setGridWidth(800);

    var grid_height = 0; //350
    var grid_width = 0;

    $("#lista").setGridWidth($('.col-md-8').width() - grid_width);
    //$("#lista").setGridHeight($('.col-md-8').height() + grid_height);

    $(window).on('resize', function(){
        $("#lista").setGridWidth($('.col-md-8').width() - grid_width);
        //$("#lista").setGridHeight($('.col-md-8').height() + grid_height);
    });

    var gridReload = function(_type){
        jQuery("#lista").setGridParam({ 
            url: link_to('credit_info'), 
            page:1, 
            postData:{
                search:true,
                type: 10,
                parameter:contract,
                add: _type
            }
        }).trigger("reloadGrid");
    }

    combobox.change(function(){
    	gridReload($(this).val());
        if (combobox.val() == 2) {
            input_txt_monto_pago.val('200');
            input_txt_monto_pago.prop('disabled', true);
        } else {
            input_txt_monto_pago.prop('disabled', false);
            input_txt_monto_pago.val('');
            input_txt_monto_pago.focus();
        }
    });

    $('button[name = "btn_reimprimir_factura"]').click(function(){
        $.cookie('hoja', combobox_hoja.val());
        $(location).attr('href',OpenInNewTab('invoice/print_invoice/' + contract + '/' + combobox_hoja.val()));
    });

    $('button[name = "btn_pagar_monto"]').click(function(){
        var valor_input = input_txt_monto_pago.val();
        var val_combobox_tosend;
        switch(combobox.val()){
            case "0":
                val_combobox_tosend = 11;
                break;
            case "1":
                val_combobox_tosend = 12;
                break;
            case "2":
                val_combobox_tosend = 13;
                break;
        }

        function limpia_con_mensaje(mensaje, titulo){
            $('<div title="' + titulo + '" class="dialog">' + mensaje + '</div>').dialog({
                width: 450, 
                maxHeight: 600,  
                resizable: false, 
                modal:true,
                buttons:{
                    'Aceptar':function(){
                        $(this).dialog('close').remove();
                    }
                }
            });

            input_txt_monto_pago.val('');
            input_txt_monto_pago.focus();
        }

        function recarga_pagina(contrato){
            input_txt_monto_pago.val('');
            $(location).attr('href',OpenInSelfTab('busquedacliente/redireccionando/' + contrato));
            not_many_clicks_button = 0;
        }

        function make_payment_message(mensaje, titulo){
            $('<div title="' + titulo + '" class="dialog">' + mensaje + '</div>').dialog({
                width: 450, 
                maxHeight: 600,  
                resizable: false, 
                modal:true,
                buttons:{
                    'Aceptar':function(){ 
                        if (not_many_clicks_button === 0) {//super codigo bajaviano
                            $.cookie('hoja', combobox_hoja.val());
                            not_many_clicks_button = 1;
                             //window.open(real_path + 'index.php/invoice/index/' + contract,'_blank'); return;
                           $.post( link_to('make_payment'), { type: val_combobox_tosend , mount: valor_input , contract: contract, balance_anterior: sumBalancetotal, Auxiliar: 0 } , function(data){
                                window.open(real_path + 'index.php/invoice/print_invoice/' + contract + '/' + combobox_hoja.val(),'_blank');
                                if (val_combobox_tosend === 13)
                                    $.post( link_to('make_payment'), { type: val_combobox_tosend , mount: valor_input , contract: contract, balance_anterior: sumBalancetotal, Auxiliar: 1 });
                                recarga_pagina(contract);
                            });
                        }
                    },
                    'Cancelar':function(){
                        $(this).dialog('close').remove();
                    }
                }
            });
            input_txt_monto_pago.focus();

        }

        if (!$.isNumeric(valor_input)){
            limpia_con_mensaje('El monto a pagar deber ser un valor numerico valido: Ej: 500.00 o 500', 'Error');
            return ;
        }
        if (valor_input < 1){
            limpia_con_mensaje('El monto a pagar debe superar el monto de RD$ 1.00', 'Error');
            return ;
        } 
        if (combobox.val() == 1 && valor_input > sumBalancetotal) {
            limpia_con_mensaje('El valor a pagar no debe ser mayor a la deuda en el pago de Caja Digital', 'Error');
            return ;
        }
        
        make_payment_message('¿Esta seguro que desea realizar el pago con el monto de RD$$ ' + input_txt_monto_pago.val() + '?', 'Seguridad');
    });

    /*function set_total(total)
    {

        $("#generated_sumbalance").html("<p> Total a pagar: RD$ " + total + "</p>");

        if($('select[name=type]').val() == 1 || $('select[name=type]').val() == 0)
            {
                $("#generated_sumbalance").html("<p> Total a pagar: RD$ " + total + "</p>");
            }
            
    }*/

});