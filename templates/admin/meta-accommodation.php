<table class="form-table">

<tr>
    <th>Liczba miejsc</th>
    <td>
        <input
            type="number"
            name="liczba_miejsc"
            value="<?php echo esc_attr($fields['liczba_miejsc']); ?>"
            class="regular-text">
    </td>
</tr>

<tr>
    <th>Adres</th>
    <td>
        <input
            type="text"
            name="adres"
            value="<?php echo esc_attr($fields['adres']); ?>"
            class="large-text">
    </td>
</tr>

<tr>
    <th>Telefon</th>
    <td>
        <input
            type="text"
            name="telefon"
            value="<?php echo esc_attr($fields['telefon']); ?>"
            class="regular-text">
    </td>
</tr>

<tr>
    <th>E-mail</th>
    <td>
        <input
            type="email"
            name="email"
            value="<?php echo esc_attr($fields['email']); ?>"
            class="regular-text">
    </td>
</tr>

<tr>
    <th>Strona WWW</th>
    <td>
        <input
            type="url"
            name="strona_www"
            value="<?php echo esc_attr($fields['strona_www']); ?>"
            class="large-text">
    </td>
</tr>

<tr>
    <th>Link do Mapy.cz</th>
    <td>
        <input
            type="url"
            name="link_mapy"
            value="<?php echo esc_attr($fields['link_mapy']); ?>"
            class="large-text">
    </td>
</tr>

</table>
