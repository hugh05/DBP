<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page language="java" import="java.sql.*" %>
<%@ page language="java" import="kr.ac.sungshin.w13.DBConnection" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete</title>
</head>
<body>
<%
	String send_id = request.getParameter("send_id");
	request.setCharacterEncoding("utf-8");
	Connection conn = null;
	PreparedStatement pstmt = null;
	int n = 0;
	
	try{
		conn = DBConnection.getConnection();
		pstmt = conn.prepareStatement("DELETE FROM employees WHERE employee_id=?");
		pstmt.setString(1, send_id);
		n = pstmt.executeUpdate();
	}finally{
		if(pstmt != null) try { pstmt.close();} catch(SQLException e){}
		if(conn != null) try { conn.close();} catch(SQLException e){}
	}
%>
<script type="text/javascript">
if(<%=n%> > 0){
alert("정상적으로 삭제되었습니다 .");
location.href="../employees/List.jsp";
}else{
alert("삭제하는데 실패했습니다 .");
history.go(-1);
}
</script>
</body>
</html>