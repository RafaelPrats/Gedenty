<table class="w-100 p-0 m-0">
    <tr class="bg-gradient-primary text-white">
        <td style="text-align: left; border-bottom: 1px solid gray" class="px-1">
            Diente: {{ $diente }} ({{ $campo }})
        </td>
        <td style="text-align: right; border-bottom: 1px solid gray; font-size: 0.8em" class="px-1">
            <i class="fa fa-fw fa-times mouse-hand"
                onclick="$('#menu-diente_{{ $diente }}').addClass('hidden')"></i>
        </td>
    </tr>
</table>
<table class="w-100 p-0 m-0">
    <td style="vertical-align: top; text-align: center" style="border-right: 1px solid gray; width: 50%">
        <table class="w-100 p-0 m-0">
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-circle" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Caries
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-circle" style="color: blue"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Obturado
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-circle-o" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Prótesis removible
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-circle-o" style="color: blue"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Prótesis existente
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-times" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Extracción indicada
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-times" style="color: blue"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Pérdida por caries
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px; position: relative;">
                    {{-- <i class="fa fa-fw fa-caret-up m-0" style="color: red; font-size: 25px;"></i> --}}
                    <div class="triangle"></div>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Endodoncia
                </td>
            </tr>
        </table>
    </td>
    <td style="vertical-align: top; text-align: center" style="border-left: 1px solid gray">
        <table class="w-100 p-0 m-0">
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-asterisk" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Sellante necesario
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-asterisk" style="color: blue"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Sellante realizado
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-times-circle-o" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Pérdida (otra causa)
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-equals" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Prótesis Total
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px; position: relative;">
                    <span style="color: red">
                        <i class="fa fa-fw fa-square-o" style="font-size: 6px"></i>---<i class="fa fa-fw fa-square-o"
                            style="font-size: 6px"></i>
                    </span>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Prótesis fija
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px; position: relative;">
                    <span style="color: red">
                        (- - -)
                    </span>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Prótesis removible
                </td>
            </tr>
            <tr onmouseover="$(this).addClass('bg-gradient-info text-white')"
                onmouseleave="$(this).removeClass('bg-gradient-info text-white')">
                <td style="text-align: center; border-bottom: 1px solid gray; width: 40px">
                    <i class="fa fa-fw fa-square-o" style="color: red"></i>
                </td>
                <td style="text-align: left; border-bottom: 1px solid gray" class="px-1 mouse-hand">
                    Corona
                </td>
            </tr>
        </table>
    </td>
</table>
