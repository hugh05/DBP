<%@ page language="java" contentType="text/html; charset=UTF-8"
pageEncoding="UTF-8"%>
<%@ page language="java" import="java.sql.*" %>
<%@ page language="java" import="kr.ac.sungshin.w13.DBConnection" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>List of employees</title>
</head>
<body>
<ul>
<li><a href="../index.html">index</a></li>
</ul>
<h3>직원 목록</h3>
<%
Connection conn = null;
PreparedStatement pstmt = null;
ResultSet rs = null;

String sql = "select employee_id, first_name, last_name, salary from employees order by employee_id desc";
try {
conn = DBConnection.getConnection();
pstmt = conn.prepareStatement(sql);
rs = pstmt.executeQuery();
out.println("<table border=\"1\">");
out.println("<tr>");
out.println("<th>"+"employee_id"+"</th>");
out.println("<th>"+"first_name"+"</th>");
out.println("<th>"+"last_name"+"</th>");
out.println("<th>"+"salary"+"</th>");
out.println("<th>"+"delete"+"</th>");
out.println("</tr>");
while(rs.next()){
out.println("<tr>");
out.println("<td>" + rs.getString("employee_id") + "</td>");
out.println("<td>" + rs.getString("first_name") + "</td>");
out.println("<td>" + rs.getString("last_name") + "</td>");
out.println("<td>" + rs.getString("salary") + "</td>");
out.println("<td><a href=\"Delete.jsp?send_id=" + rs.getString("employee_id") + "\">delete</a></td>"); 
out.println("</tr>");
}
out.println("</table>");
} catch (SQLException e){
out.println(e.getMessage());
} finally {
if(rs != null) rs.close();
if(pstmt != null) pstmt.close();
if(conn != null) conn.close();
}
%>
</body>
</html>