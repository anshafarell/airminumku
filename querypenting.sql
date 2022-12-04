select sumber, sum(jumlah) from airminum group by sumber;

select sumber, sum(jumlah) from airminum where kecamatan="KECAMATAN WADO" group by sumber;

select kecamatan, sumber, jumlah from airminum where sumber in (select sumber from airminum group by sumber);

select kecamatan, sumber, jumlah from airminum where sumber in (select sumber from airminum group by sumber) group by sumber;

SELECT desa, sumber, jumlah FROM airminum ORDER BY desa, sumber;