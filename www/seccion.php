<table id="visor_estructura" class="table-responsive">
    <tr>
        <td id="MSCFC" colspan="5" class="m">TOP TOP</td>
    </tr>
    <tr>
        <td id="MSC" colspan="4" class="m">TOP</td>		
        <td id="MDFC" rowspan="10" class="m">RIGHT RIGHT</td>
    </tr>
    <tr>
        <td id="C" colspan="4" style="color:#ce4724;border:1px solid #ce4724;">Cabecera <span id="MDC" class="m" style="color:white"> CENTER IN </span></td>
    </tr>
    <tr>
        <td id="MBC" colspan="4" class="m">TOP BOTTOM</td>
    </tr>
    <tr>
        <td id="MVI" rowspan="6" class="m">LEFT</td>
        <td id="MSN" colspan="2" class="m"><?php Noticias::seccionPrincipales(); ?></td>
        <td id="MVD" rowspan="6" class="m"><?php Menu::secciones();?></td>
    </tr>
    <tr>
        <td id="NP" colspan="2"></td>
    </tr>
    <tr>
        <td id="MSNC" class="m"><?php Noticias::seccionIzquierda(); ?></td>
        <td id="MTC" class="m"><?php Noticias::seccionDerecha(); ?></td>
    </tr>
    <tr>
        <td id="NC"></td>
        <td id="TC" rowspan="2"></td>
    </tr>
    <tr>
        <td id="MFIN1" class="m">LEFT BOTTOM</td>
    </tr>
    <tr>
        <td id="MFIN2" class="m" colspan="2"><?php Publicidad::banner('ford'); ?></td>
    </tr>
    <tr>
        <td id="MFIN3" class="m" colspan="4">BOTTOM</td>
    </tr>
    <tr>
        <td id="C" colspan="5" style="color:#ce4724; border:1px solid #ce4724;">Pie</td>
    </tr>                    
</table>