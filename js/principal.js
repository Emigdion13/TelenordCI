$(document).ready(function(){
   $("#lista").jqGrid({
        mtype: 'POST',
        postData:{ 
            },
        datatype: 'json',
        url: link_to('data'),
        colNames: ['Contrato', 'Nombre', 'Cedula', 'Direccion', 'Balance', 'Status'],
        colModel: [
        { name: 'Contrato', index: 'Contrato', width: 100, align:'center', sortable: false },
        { name: 'Nombre', index: 'Nombre', width: 210, sortable: false, search:false },
        { name: 'Cedula', index: 'Cedula', width: 80, sortable: false, search:false },
        { name: 'Direccion', index: 'Direccion', width: 250, sortable: false, search:false},
        { name: 'Balance', index: 'Balance', width: 80, formatter:'number', sortable: false, search:false, align:'right'},
        { name: 'Estatus', index: 'Estatus', width: 170, sortable: false, search:false, align:'right' }
        /*{ name: 'Contrato', index: 'Contrato', align:'center', sortable: false },
        { name: 'Nombre', index: 'Nombre', sortable: false, search:false },
        { name: 'Cedula', index: 'Cedula', sortable: false, search:false },
        { name: 'Direccion', index: 'Direccion', sortable: false, search:false},
        { name: 'Balance', index: 'Balance', formatter:'number', sortable: false, search:false, align:'right'},
        { name: 'Estatus', index: 'Estatus', sortable: false, search:false, align:'right' }*/
        ],
        autowidth: true,
        rowNum:20,
        rowList:[20],
        ondblClickRow: function(id) {
            var data = jQuery("#lista").jqGrid('getRowData',id);
            OpenInSelfTab('busquedacliente/redireccionando/' + data.Contrato);
        },
        loadComplete: function(data) {
           if(!data.user_logged)
                window.location = real_path;
        },
        pager: '#paginador', 
        sortname: 'Contrato', 
        viewrecords: true, 
        sortorder: "desc", 
        caption:"Busqueda Clientes" });

        $("#lista").jqGrid('navGrid','#paginador',{edit:false,add:false,del:false});
        //$('#lista').maxHeight(400);
        //$("#lista").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});

        $(document).on('keydown',function(e){
            if(e.which == 113) {
                $('#search_lista').click();
            }
                
        });

    $("#lista").setGridWidth($('.col-md-8').width());
    $("#lista").setGridHeight($( window ).height() - 500);

    $(window).on('resize', function(){
        $("#lista").setGridWidth($('.col-md-8').width());
        if ($( window ).height() - 500 > 160)
            $("#lista").setGridHeight($( window ).height() - 500);
        else
            $("#lista").setGridHeight(160);
    });

        /*var gridheight = 470;
        if (($(window).height() - gridheight) < 151){
            var gridheight_ = 150;
        } else 
        {
            var gridheight_ = ($(window).height() - gridheight);
        }

        //$("#lista").setGridWidth($('html').width() - grid_width);
        $("#lista").setGridWidth($('html').width());
        $("#lista").setGridHeight($(window).height() - gridheight);    

        $( window ).resize(function() {
            $("#lista").setGridWidth($('html').width());
        if (($(window).height() - gridheight) < 151){
            $("#lista").setGridHeight(150);
        } else 
        {
             $("#lista").setGridHeight($(window).height() - gridheight);
        }
            
        });*/

        $.extend(
            $.jgrid.search,
            {
                closeAfterSearch: true ,
                onClose:function(p){
                    $('#jqg1').val('');
                },
                afterShowSearch:function(){
                    $('#jqg1').focus();
                },
                afterRedraw: function (p) {
                    var $form = $(this), formId = this.id, // fbox_list
                        bindKeydown = function () {
                            $form.find("td.data>.input-elm").keydown(function (e) {
                                if (e.which === 13) {
                                    $(e.target).change();
                                    $("#" + $.jgrid.jqID(formId) + "_search").click();
                                }
                                else if (e.which === 27) {
                                    $(".ui-icon-closethick").click();
                                    return false;
                                }
                            });
                        };
                    bindKeydown.call(this);
                }
            }
        );


        $('#search').on('click',function(){
            var id = jQuery("#lista").jqGrid('getGridParam','selrow');

            if(!id)
                return false;

            var data = jQuery("#lista").jqGrid('getRowData',id);

            $.post(link_to('load_client_view'),{contrato: data.Contrato},function(data){
                $('<div title="Datos del cliente" class="dialog"></div>').html(data).dialog({
                    width: 900, 
                    maxHeight: 600, 
                    height:600, 
                    resizable: true, 
                    modal:true
                });
            });
        }); 


});
