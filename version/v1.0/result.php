<?php

  // get json data from search.php
  include('search.php');

  // print_r($data);

?>


<script>

  // convert json string to object
  var data = JSON.parse('<?php echo $data;?>');

  // href maps
  var href_maps = {
    'genename': 'https://www.genecards.org/Search/Keyword?queryString=',
    'rsid': 'https://www.ncbi.nlm.nih.gov/projects/SNP/snp_ref.cgi?rs='
  };

  // var header = '<th>CHROM</th><th>POS</th><th>REF</th><th>ALT</th><th>RSID</th>';
  var header_list = [
    'chrom',
    'pos',
    'ref',
    'alt',
    'rsid',
    'genename',
    'aachange',
    'func',
    'novo_wes_an',
    'novo_wes_hom_af',
    'novo_wes_het_af',
    'novo_wes_hwe',
    'novo_wes_ad_mean',
    'novo_wes_ad_percentile',
    // 'novo_wes_ref_samples',
    // 'novo_wes_hom_samples',
    // 'novo_wes_het_samples',
    'novo_wgs_an',
    'novo_wgs_hom_af',
    'novo_wgs_het_af',
    'novo_wgs_hwe',
    'novo_wgs_ad_mean',
    'novo_wgs_ad_percentile',
    // 'novo_wgs_ref_samples',
    // 'novo_wgs_hom_samples',
    // 'novo_wgs_het_samples',
    'chinese_1000g',
    'all_1000g',
    'eas_1000g',
    'esp6500si_all',
    'gnomad_all_af',
    'gnomad_all_an',
    'gnomad_eas_af',
    'gnomad_eas_an',
  ];

  if ( data.error ) {
    $('#result tbody').append('<p class="alert alert-warning text-center">' + data.error + '</p>');
  } else {
    // add header
    $(header_list).each(function (idx, h) {
      var th = document.createElement('th');
      th.innerText = h.toUpperCase();
      $('#result thead tr').append(th);
    });

    // add lines
    $(data).each(function (idx, d) {
      var tr = document.createElement('tr');
      $(header_list).each(function (idx, h) {
        var td = document.createElement('td');
        // td.innerText = d[h];
        if ( ['genename', 'rsid'].includes(h) && d[h] != '.' ) {
          var a = document.createElement('a');
          a.innerText = d[h];
          a.href = href_maps[h] + d[h];
          a.target = '_blank';
          td.append(a);
        } else {
          td.innerText = d[h];
        }
        tr.append(td);
      });
      $('#result tbody').append(tr);
    });
  }

  $('#result').DataTable({
    scrollY: "300px",
  scrollX: true,
  scrollCollapse: true, 
  lengthMenu: [[5,10,50,100,-1], [5,10,50,100,'All']], 

  dom: '<"top"Bf>rt<"bottom"ip><"clear">',
  buttons: [
    'pageLength', 
    'copy', 
    'print',
    'csv',
    'excelHtml5',
  ],
  });

</script>
