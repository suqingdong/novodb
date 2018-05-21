<?php

$header_list = [
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
// print_r($header_list);

$href_maps = [
  'genename' => 'https://www.genecards.org/Search/Keyword?queryString=',
  'rsid' => 'https://www.ncbi.nlm.nih.gov/projects/SNP/snp_ref.cgi?rs='
];
// print_r($href_maps);

?>