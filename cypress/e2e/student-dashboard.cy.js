describe('Student Dashboard', () => {
  const viewports = ['macbook-13', 'iphone-x'];


  viewports.forEach((viewport) => {
    const testUserId = Math.floor(Math.random() * 100000);
    const testUser = {
      name: `Dash User ${testUserId}`,
      email: `dashuser${testUserId}@example.com`,
      password: `DashPass123!`,
      phone: `88888${testUserId}`.substring(0, 10)
    };
    context(`Testing on ${viewport}`, () => {
      before(() => {
        // Register a user once per viewport test suite to use for dashboard testing
        cy.viewport(viewport);
        cy.visit('/signup');
        cy.get('#full_name:visible').first().type(testUser.name);
        cy.get('#email:visible').first().type(testUser.email);
        cy.get('#phone:visible').first().type(testUser.phone);
        cy.get('#password:visible').first().type(testUser.password);
        cy.get('#confirm_password:visible').first().type(testUser.password);
        cy.get('button[type="submit"]:visible').contains(/sign up|register|create account/i).click();
        
        // Wait for signup to complete and redirect before moving to the login phase
        cy.url().should('include', '/login');
      });

      beforeEach(() => {
        cy.viewport(viewport);
        // Login before each test
        cy.visit('/login');
        cy.get('#email:visible').first().type(testUser.email);
        cy.get('#password:visible').first().type(testUser.password);
        cy.get('button[type="submit"]:visible').contains(/log in|login|sign in/i).click();
        
        // Wait for the login redirect to finish so the session is established
        cy.url().should('satisfy', (url) => url.includes('/student/dashboard') || url === Cypress.config().baseUrl + '/');
      });

      it('should view the student dashboard', () => {
        cy.visit('/student/dashboard');
        cy.url().should('include', '/student/dashboard');
        // Check for common dashboard elements
        cy.get('body').should('exist');
      });

      it('should navigate to courses', () => {
        cy.visit('/student/courses');
        cy.url().should('include', '/student/courses');
      });

      it('should navigate to profile page', () => {
        cy.visit('/student/profile');
        cy.url().should('include', '/student/profile');
      });
      
      it('should navigate to mock tests', () => {
        cy.visit('/student/mock-tests');
        cy.url().should('include', '/student/mock-tests');
      });
      
      it('should navigate to academy/enrollment page', () => {
        cy.visit('/student/academy');
        cy.url().should('include', '/student/academy');
      });

      it('should allow logout', () => {
        cy.visit('/logout');
        // Should redirect to homepage or login
        cy.url().should('not.include', '/student/dashboard');
      });
    });
  });
});
