<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-cell" align="left">
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                  <small style="font-size:x-small; color: darkgray">
                    @lang('mails.layout.description')
                  </small>
                </td>
            </tr>
        </table>
    </td>
</tr>
