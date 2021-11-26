select * from estados;

select * from conceptos;

select * from periodos;

select * from colegiados where idColegiado ='1688';

select * from pagositems order by idDetalle desc;

select * from pagos where idColegiado ='1688';

select a.idAportacion,a.idColegiado,a.idPago,a.idPeriodo,p.anio,p.cuota,p.periodo_descripcion,
	a.mes,
	case 
		when a.mes>(DATE_FORMAT(DATE_SUB(now(),interval 6 MONTH),'%m')) then "Habilitado"
		else "Inhabilitado"
	end,
	a.monto,a.fecha_aporte,a.creado_el,a.actualizado_el 
from aportaciones a
inner join periodos p 
on a.idPeriodo =p.idPeriodo
where p.anio ='2021'
order by a.idAportacion desc;

select a.idAportacion,a.idColegiado,a.idPago,a.idPeriodo,p.anio,p.cuota,p.periodo_descripcion,
	a.mes,
	case 
		when a.mes>(DATE_FORMAT(DATE_SUB(now(),interval 6 MONTH),'%m')) then "Habilitado"
		else "Inhabilitado"
	end,
	a.monto,a.fecha_aporte,a.creado_el,a.actualizado_el 
from aportaciones a
inner join periodos p 
on a.idPeriodo =p.idPeriodo
where p.anio ='2021' and idColegiado ='1688'
order by a.idAportacion desc limit 1;


select month(now()) 
select date_format(now(),'%m')
select unix_timestamp(DATE_FORMAT(DATE_SUB(now(),interval 6 MONTH),'%m'));
select DATE_SUB(now(),interval 6 MONTH);
SELECT TIMESTAMPDIFF(MONTH, '2012-05-05', NOW())