<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'cms')
<table style="border-collapse:collapse;width:740px" width="740" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody>
        <tr>
            <img width:100px src="http://localhost:8080/img/logo.png" class="logo" alt="CMS">
        </tr>
    </tbody>
</table>

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
